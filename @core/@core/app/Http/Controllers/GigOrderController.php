<?php

namespace App\Http\Controllers;

use App\GigOrder;
use App\Mail\PaymentSuccess;
use App\Order;
use App\PaymentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use KingFlamez\Rave\Facades\Rave;
use Mollie\Laravel\Facades\Mollie;
use Razorpay\Api\Api;
use Stripe\Charge;
use Stripe\Stripe;

class GigOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['paypal_ipn','paytm_ipn']);
    }

    public function gig_new_order(Request  $request){
        $this->validate($request,[
            'full_name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'message' => 'required',
            'additional_note' => 'nullable',
            'selected_payment_gateway' => 'required|string|max:191',
            'file' => 'nullable|mimes:zip|max:252000',
        ]);

        $payment_track = Str::random(32);
        $payment_gateway = $request->selected_payment_gateway;
        $gig_details = GigOrder::find($request->gig_order_id);
        if (empty($gig_details)){
            $gig_details = GigOrder::create([
                'full_name' => $request->full_name,
                'email' => $request->email,
                'message' => $request->message,
                'additional_note' => $request->additional_note,
                'selected_payment_gateway' => $request->selected_payment_gateway,
                'gig_id' => $request->gig_id,
                'selected_plan_index' => $request->selected_plan_index,
                'selected_plan_revisions' => $request->selected_plan_revisions,
                'selected_plan_delivery_days' => $request->selected_plan_delivery_days,
                'selected_plan_price' => $request->selected_plan_price,
                'selected_plan_title' => $request->selected_plan_title,
                'payment_track' => $payment_track,
                'payment_status' => 'pending',
                'order_status' => 'pending',
                'seen' => 0,
                'user_id' => auth()->guard('web')->user()->id,
            ]);
        }

        //add file name to database;
        if ($request->hasFile('file')){
            $file = $request->file('file');
            $file_name = Str::slug($file->getClientOriginalName());
            $file_ext = strtolower($file->getClientOriginalExtension());
            if ($file_ext == 'zip'){
                $db_file_name = 'order-file'.$gig_details->id.$file_name.'.'.$file_ext;
                $file->move('assets/uploads/gig-files',$db_file_name);
                $gig_details->file = $db_file_name;
                $gig_details->save();
            }
        }


        if ($payment_gateway === 'paypal'){

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
                'amount' => $gig_details->selected_plan_price,
                'description' =>'Payment For Gig Order Id: #'.$gig_details->id.' Gig Plan Name: '.$gig_details->selected_plan_title.' Payer Name: '.$gig_details->full_name.' Payer Email:'.$gig_details->email,
                'item_name' => 'Payment For Gig Order Id: #'.$gig_details->id,
                'ipn_url' => route('frontend.gig.paypal.ipn'),
                'cancel_url' => route('frontend.gig.order.payment.cancel',$gig_details->id),
                'payment_track' => $gig_details->payment_track,
            ]);

            session()->put('gig_id',$gig_details->id);
            return redirect()->away($redirect_url);

        }elseif($payment_gateway === 'paytm'){

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
                'order_id' => $gig_details->payment_track,
                'email' => $gig_details->email,
                'name' => $gig_details->full_name,
                'amount' => $gig_details->selected_plan_price,
                'callback_url' => route('frontend.gig.paytm.ipn')
            ]);
            return $redirect_url;

        }elseif($payment_gateway === 'razorpay'){

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
                'price' =>$gig_details->selected_plan_price,
                'title' => $gig_details->selected_plan_title,
                'description' => 'Payment For Gig Order Id: #'.$gig_details->id.' Gig Plan Name: '.$gig_details->selected_plan_title.' Payer Name: '.$gig_details->full_name.' Payer Email:'.$gig_details->email,
                'route' => route('frontend.gig.razorpay.ipn'),
                'order_id' => $gig_details->id
            ]);
            return $redirect_url;

        }elseif($payment_gateway === 'stripe'){

            $stripe_data['order_id'] = $gig_details->id;
            $stripe_data['route'] = route('frontend.gig.stripe.ipn');
            return view('payment.stripe')->with('stripe_data' ,$stripe_data);

        }elseif($payment_gateway === 'mollie'){

            /**
             * @required param list
             * amount
             * description
             * redirect_url
             * order_id
             * track
             * */
            $return_url =  mollie_gateway()->charge_customer([
                'amount' =>$gig_details->selected_plan_price,
                'description' =>'Payment For Gig Order Id: #'.$gig_details->id.' Package Name: '.$gig_details->selected_plan_title.' Payer Name: '.$gig_details->full_name.' Payer Email:'.$gig_details->email,
                'web_hook' => route('frontend.gig.mollie.webhook'),
                'order_id' => $gig_details->id,
                'track' => $gig_details->payment_track,
            ]);
            return $return_url;

        }elseif($payment_gateway === 'paystack'){

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
                'amount' => $gig_details->selected_plan_price,
                'package_name' => $gig_details->selected_plan_title,
                'name' => $gig_details->full_name,
                'email' => $gig_details->email,
                'order_id' => $gig_details->id,
                'track' => $gig_details->payment_track,
                'type' => 'gig',
                'route' => route('frontend.paystack.pay'),
            ]);

            return $view_file;

        }elseif($payment_gateway === 'flutterwave'){

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
                'name' => $gig_details->full_name,
                'email' => $gig_details->email,
                'order_id' => $gig_details->id,
                'amount' => $gig_details->selected_plan_price,
                'track' => $gig_details->payment_track,
                'description' =>  'Payment For Order Id: #'.$gig_details->id.' Package Name: '.$gig_details->selected_plan_title.' Payer Name: '.$gig_details->full_name.' Payer Email:'.$gig_details->email,
                'ipn_route' => route('frontend.gig.flutterwave.pay'),
            ]);
            return $view_file;

        }elseif($payment_gateway === 'manual_payment'){
            $this->validate($request,[
                'transaction_id' => 'required'
            ],[
                'transaction_id.required' => __('you must have to provide transaction id for verify your payment')
            ]);
            $gig_details->transaction_id = $request->transaction_id;
            $gig_details->save();
            $this->send_order_mail($gig_details->id);
            return redirect()->route('frontend.gig.order.payment.success',Str::random(6).$gig_details->id.Str::random(6));
        }

        return redirect()->route('homepage');
    }

    public function paypal_ipn(Request $request)
    {
        $gig_id = session()->get('gig_id');
        session()->forget('gig_id');
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
            'cancel_url' => route('frontend.gig.order.payment.cancel',$gig_id),
            'success_url' => route('frontend.gig.order.payment.success',$gig_id)
        ]);
         if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
             $this->update_database($gig_id, $payment_data['transaction_id']);
             $this->send_order_mail($gig_id);
             $order_id = Str::random(6) . $gig_id . Str::random(6);
             return redirect()->route('frontend.gig.order.payment.success',$order_id);
         }
        return redirect()->route('frontend.gig.order.payment.cancel',$gig_id);
    }

    public function flutterwave_pay(Request $request){
        Rave::initialize(route('frontend.gig.flutterwave.callback'));
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
            $gig_order = GigOrder::where( 'payment_track', $payment_data['track'] )->first();
            $this->update_database($gig_order->id, $payment_data['transaction_id']);
            $this->send_order_mail($gig_order->id);
            $order_id = Str::random(6) . $gig_order->id . Str::random(6);
            return redirect()->route('frontend.gig.order.payment.success',$order_id);
        }
        abort(404);
    }

    public function paytm_ipn(Request $request){
        $order_id = $request['ORDERID'];
        $payment_logs = GigOrder::where( 'payment_track', $order_id )->first();
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
            $this->update_database($payment_logs->id, $payment_data['transaction_id']);
            $this->send_order_mail($payment_logs->id);
            $order_id = Str::random(6) . $payment_logs->id . Str::random(6);
            return redirect()->route('frontend.gig.order.payment.success',$order_id);
        }
        return redirect()->route('frontend.gig.order.payment.cancel',$payment_logs->id);

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
            $gig_details = GigOrder::find($payment_data['order_id']);
            $this->update_database($gig_details->id, $payment_data['transaction_id']);
            $this->send_order_mail($gig_details->id);
            $order_id = Str::random(6) . $gig_details->id. Str::random(6);
            return redirect()->route('frontend.gig.order.payment.success',$order_id);
        }
        abort(404);
    }

    public function razorpay_ipn(Request $request){

        $gig_details = GigOrder::where('id',$request->order_id)->first();
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
            $this->update_database($gig_details->id, $payment_data['transaction_id']);
            $this->send_order_mail($gig_details->id);
            $order_id = Str::random(6) . $gig_details->id. Str::random(6);
            return redirect()->route('frontend.gig.order.payment.success',$order_id);
        }
        return redirect()->route('frontend.gig.order.payment.cancel',$gig_details->id);
    }

    public function stripe_ipn(Request $request){
        /**
         * @require params
         * */
        $job_applicant_id = session()->get('stripe_order_id');
        session()->forget('stripe_order_id');

        $payment_data = stripe_gateway()->ipn_response();
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $this->update_database($job_applicant_id, $payment_data['transaction_id']);
            $this->send_order_mail($job_applicant_id);
            $order_id = Str::random(6) . $job_applicant_id . Str::random(6);
            return redirect()->route('frontend.gig.order.payment.success',$order_id);
        }
        return redirect()->route('frontend.gig.order.payment.cancel',$job_applicant_id);

    }

    public function stripe_charge(Request $request)
    {
        $order_details = GigOrder::findOrFail($request->order_id);

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
            'product_name' => $order_details->selected_plan_title,
            'amount' => $order_details->selected_plan_price,
            'description' => 'Payment From '. get_static_option('site_'.get_default_language().'_title').'. Gig Order ID #'.$order_details->id .', Payer Name: '.$order_details->full_name.', Payer Email: '.$order_details->email,
            'ipn_url' => route('frontend.gig.stripe.success'),
            'order_id' => $request->order_id,
            'cancel_url' => route('frontend.gig.order.payment.cancel',$request->order_id)
        ]);
        return response()->json(['id' => $stripe_session['id']]);
    }

    public function update_database($order_id,$transaction_id){
        GigOrder::findOrFail($order_id)->update(['transaction_id' => $transaction_id,'payment_status' => 'complete']);
    }
    public function send_order_mail($order_id){
        $gig_details = GigOrder::find($order_id);
        $default_lang = get_default_language();
        $admin_email = !empty(get_static_option('gig_page_notify_email')) ? get_static_option('gig_page_notify_email') : get_static_option('site_global_email');
        Mail::to($gig_details->email)->send(new \App\Mail\GigOrder($gig_details,'customer',__('Your order has been placed in ').get_static_option('site_'.$default_lang.'_title')));
        Mail::to($admin_email)->send(new \App\Mail\GigOrder($gig_details,'owner',__('Your have a new gig order in ').get_static_option('site_'.$default_lang.'_title')));
    }

}
