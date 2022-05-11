<?php

namespace App\Http\Controllers;

use App\Donation;
use App\DonationLogs;
use App\EventAttendance;
use App\EventPaymentLogs;
use App\Events;
use App\GigOrder;
use App\Mail\DonationMessage;
use App\Mail\PaymentSuccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use KingFlamez\Rave\Facades\Rave;
use Mollie\Laravel\Facades\Mollie;
use Razorpay\Api\Api;
use Stripe\Charge;
use Stripe\Stripe;
use Unicodeveloper\Paystack\Facades\Paystack;

class DonationLogController extends Controller
{
    public function store_donation_logs(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'donation_id' => 'required|string',
            'amount' => 'required|string',
            'selected_payment_gateway' => 'required|string',
        ],
        [
            'name.required' => __('Name field is required'),
            'email.required' => __('Email field is required'),
            'amount.required' => __('Amount field is required'),
        ]
        );
        $donation_payment_details = DonationLogs::find($request->order_id);
        if (empty($donation_payment_details)) {
            $donation_payment_details = DonationLogs::create([
                'email' => $request->email,
                'name' => $request->name,
                'donation_id' => $request->donation_id,
                'amount' => $request->amount,
                'donation_type' => $request->donation_type,
                'payment_gateway' => $request->selected_payment_gateway,
                'user_id' => auth()->check() ? auth()->user()->id : '',
                'status' => 'pending',
                'track' => Str::random(10) . Str::random(10),
            ]);
        }


        //have to work on below code
        if ($request->selected_payment_gateway === 'paypal'){
            /**
             * @required param list
             * $args['amount']
             * $args['description']
             * $args['item_name']
             * $args['ipn_url']
             * $args['cancel_url']
             * $args['payment_track']
             * return redirect url for paypal
             * */
            $redirect_url =  paypal_gateway()->charge_customer([
                'amount' => $donation_payment_details->amount,
                'description' => __('Payment For Donation:').' '.$donation_payment_details->donation->title  ?? ''. ' #'.$donation_payment_details->id,
                'item_name' => __('Payment For Donation:').' '.$donation_payment_details->donation->title ?? '',
                'ipn_url' => route('frontend.donation.paypal.ipn'),
                'cancel_url' => route('frontend.donation.payment.cancel',$donation_payment_details->id),
                'payment_track' => $donation_payment_details->track,
            ]);

            session()->put('donation_id',$donation_payment_details->id);
            return redirect()->away($redirect_url);

        }elseif ($request->selected_payment_gateway === 'paytm'){
            /**
             *
             * charge_customer()
             * @required params
             * int order_id
             * string name
             * string email
             * int/float amount
             * string/url callback_url
             * */
            $redirect_url =  paytm_gateway()->charge_customer([
                'order_id' => $donation_payment_details->id,
                'email' => $donation_payment_details->email,
                'name' => $donation_payment_details->name,
                'amount' => $donation_payment_details->amount,
                'callback_url' => route('frontend.donation.paytm.ipn')
            ]);
            return $redirect_url;

        }elseif ($request->selected_payment_gateway === 'manual_payment'){
            $this->validate($request,[
                'transaction_id' => 'required|string'
            ],
            [
                'transaction_id.required' => __('Transaction ID Required')
            ]);

            DonationLogs::where('donation_id',$request->donation_id)->update(['transaction_id' => $request->transaction_id]);

            return redirect()->route('frontend.donation.payment.success',Str::random(6).$donation_payment_details->id.Str::random(6));

        }elseif ($request->selected_payment_gateway === 'stripe'){


            $stripe_data['order_id'] = $donation_payment_details->id;
            $stripe_data['route'] = route('frontend.donation.stripe.charge');
            return view('payment.stripe')->with('stripe_data' ,$stripe_data);
        }
        elseif ($request->selected_payment_gateway === 'razorpay'){
            /**
             *
             * @param array $args
             * @paral list
             * price
             * title
             * description
             * route
             * order_id
             *
             * @return @view with param
             */
            $redirect_url = razorpay_gateway()->charge_customer([
                'price' => $donation_payment_details->amount,
                'title' => $donation_payment_details->donation->title ?? __('Untitled Donation'),
                'description' => 'Payment For donation Id: #'.$donation_payment_details->id.' Payer Name: '.$donation_payment_details->name.' Payer Email:'.$donation_payment_details->email,
                'route' => route('frontend.donation.razorpay.ipn'),
                'order_id' => $donation_payment_details->id
            ]);
            return $redirect_url;
        }
        elseif ($request->selected_payment_gateway === 'paystack'){

            /**
             * @required param list
             * 'amount'
             * 'package_name'
             * 'name'
             * 'email'
             * 'order_id'
             * 'track'
             * */
            $view_file = paystack_gateway()->charge_customer([
                'amount' => $donation_payment_details->amount,
                'package_name' => $donation_payment_details->donation->title ?? __('Untitled Donation'),
                'name' => $donation_payment_details->name,
                'email' => $donation_payment_details->email,
                'order_id' => $donation_payment_details->id,
                'track' => $donation_payment_details->track,
                'type' => 'donation',
                'route' => route('frontend.donation.paystack.pay'),
            ]);

            return $view_file;
        }
        elseif ($request->selected_payment_gateway === 'mollie'){

            /**
             * @required param list
             * amount
             * description
             * redirect_url
             * order_id
             * track
             * */
            $return_url =  mollie_gateway()->charge_customer([
                'amount' => $donation_payment_details->amount,
                'description' =>'Payment For Donation Id: #'.$donation_payment_details->id.' Payer Name: '.$donation_payment_details->name.' Payer Email:'.$donation_payment_details->email,
                'web_hook' => route('frontend.donation.mollie.webhook'),
                'order_id' => $donation_payment_details->id,
                'track' => $donation_payment_details->track,
            ]);
            return $return_url;

        }
        elseif ($request->selected_payment_gateway === 'flutterwave'){

            /**
             * @required params
             * name
             * email
             * ipn_route
             * amount
             * description
             * order_id
             * track
             *
             * */
            $view_file =  flutterwaverave_gateway()->charge_customer([
                'name' => $donation_payment_details->name,
                'email' => $donation_payment_details->email,
                'order_id' => $donation_payment_details->id,
                'amount' => $donation_payment_details->amount,
                'track' => $donation_payment_details->track,
                'description' =>  'Payment For Donation Id: #'.$donation_payment_details->id.' Payer Name: '.$donation_payment_details->name.' Payer Email:'.$donation_payment_details->email,
                'ipn_route' => route('frontend.donation.flutterwave.pay'),
            ]);
            return $view_file;

        }
        return redirect()->route('homepage');
    }

    public function flutterwave_pay(Request $request){
        Rave::initialize(route('frontend.donation.flutterwave.callback'));
    }
    /**
     * Obtain Rave callback information
     * @return \Illuminate\Http\RedirectResponse
     */
    public function flutterwave_callback(Request $request)
    {
        /**
         *
         * @param array $args
         * @required param list
         * request
         *
         * @return array
         */
        $payment_data = flutterwaverave_gateway()->ipn_response([
            'request' => $request
        ]);

        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $donation_log_details = DonationLogs::where( 'track', $payment_data['track'] )->first();
            $this->update_database($donation_log_details->id, $payment_data['transaction_id']);
            $this->send_order_mail($donation_log_details->id);
            $order_id = Str::random(6) . $donation_log_details->id . Str::random(6);
            return redirect()->route('frontend.donation.payment.success',$order_id);
        }
        abort(404);

    }

    public function paypal_ipn(Request $request)
    {

        $donation_id = session()->get('donation_id');
        session()->forget('donation_id');
        /**
         * @required param list
         * $args['request']
         * $args['cancel_url']
         * $args['success_url']
         *
         * return @void
         * */
        $payment_data = paypal_gateway()->ipn_response([
            'request' => $request,
            'cancel_url' => route('frontend.donation.payment.cancel',$donation_id),
            'success_url' => route('frontend.donation.payment.success',$donation_id)
        ]);
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $this->update_database($donation_id, $payment_data['transaction_id']);
            $this->send_order_mail($donation_id);
            $order_id = Str::random(6) . $donation_id . Str::random(6);
            return redirect()->route('frontend.donation.payment.success',$order_id);
        }
        return redirect()->route('frontend.donation.payment.cancel',$donation_id);
    }

    public function paytm_ipn(Request $request){

        $order_id = $request['ORDERID'];
        /**
         *
         * ipn_response()
         *
         * @return array
         * @param
         * transaction_id
         * status
         * */
        $payment_data = paytm_gateway()->ipn_response();
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $this->update_database($order_id, $payment_data['transaction_id']);
            $this->send_order_mail($order_id);
            $encoded_order_id = Str::random(6) . $order_id . Str::random(6);
            return redirect()->route('frontend.donation.payment.success',$encoded_order_id);
        }
        return redirect()->route('frontend.donation.payment.cancel',$order_id);
    }

    public function stripe_charge(Request $request){
        $donation_log_details = DonationLogs::findOrFail($request->order_id);

        /**
         * @require params
         *
         * product_name
         * amount
         * description
         * ipn_url
         * cancel_url
         * order_id
         *
         * */
        $stripe_session =  stripe_gateway()->charge_customer([
            'product_name' => $donation_log_details->donation->title ?? __('Untitled Donation') ,
            'amount' => $donation_log_details->amount,
            'description' => 'Payment From '. get_static_option('site_'.get_default_language().'_title').'. Donation Log ID #'.$donation_log_details->id .', Payer Name: '.$donation_log_details->name.', Payer Email: '.$donation_log_details->email,
            'ipn_url' => route('frontend.donation.stripe.ipn'),
            'order_id' => $donation_log_details->id,
            'cancel_url' => route('frontend.donation.payment.cancel',$donation_log_details->id)
        ]);
        return response()->json(['id' => $stripe_session['id']]);
    }
    public function stripe_ipn(Request $request)
    {
        /**
         * @require params
         * */
        $donation_log_id = session()->get('stripe_order_id');
        session()->forget('stripe_order_id');

        $payment_data = stripe_gateway()->ipn_response();
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $this->update_database($donation_log_id, $payment_data['transaction_id']);
            $this->send_order_mail($donation_log_id);
            $order_id = Str::random(6) . $donation_log_id . Str::random(6);
            return redirect()->route('frontend.donation.payment.success',$order_id);
        }
        return redirect()->route('frontend.donation.payment.cancel',$donation_log_id);
        }

    public function razorpay_ipn(Request $request){
        $donation_logs_id = $request->order_id;
        /**
         *
         * @param array $args
         * require param list
         * request
         * @return array|string[]
         *
         */
        $payment_data = razorpay_gateway()->ipn_response(['request' => $request]);
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $this->update_database($donation_logs_id, $payment_data['transaction_id']);
            $this->send_order_mail($donation_logs_id);
            $order_id = Str::random(6) . $donation_logs_id. Str::random(6);
            return redirect()->route('frontend.donation.payment.success',$order_id);
        }
        return redirect()->route('frontend.donation.payment.cancel',$donation_logs_id);
    }

    public function mollie_webhook(){
        /**
         *
         * @param array $args
         * require param list
         * request
         * @return array|string[]
         *
         */
        $payment_data = mollie_gateway()->ipn_response();
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $this->update_database($payment_data['order_id'], $payment_data['transaction_id']);
            $this->send_order_mail($payment_data['order_id']);
            $order_id = Str::random(6) . $payment_data['order_id']. Str::random(6);
            return redirect()->route('frontend.donation.payment.success',$order_id);
        }
        abort(404);
    }

    public function paystack_pay(){
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    public function send_order_mail($donation_log_id){
        $donation_details = DonationLogs::find($donation_log_id);
        Mail::to(get_static_option('site_global_email'))->send(new DonationMessage($donation_details,__('You have a new donation payment from '.get_static_option('site_'.get_default_language().'_title')),'owner'));
        Mail::to(get_static_option('donation_notify_mail'))->send(new DonationMessage($donation_details,__('Your donation payment success for '.get_static_option('site_'.get_default_language().'_title')),'customer'));
    }

    private function update_database($donation_id, $transaction_id)
    {
        //donation logs update
        $payment_log_details = DonationLogs::findOrFail($donation_id);
        $payment_log_details->status = 'complete';
        $payment_log_details->transaction_id = $transaction_id;
        $payment_log_details->save();

        //update donation raised amount
        $event_details = Donation::findOrFail($payment_log_details->donation_id);
        $event_details->raised = (int)$event_details->raised + (int)$payment_log_details->amount;
        $event_details->save();

    }

}
