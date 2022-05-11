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
use App\Mail\PlaceOrder;
use App\Order;
use App\PaymentLogs;
use App\PricePlan;
use App\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use KingFlamez\Rave\Facades\Rave;
use Mollie\Laravel\Facades\Mollie;
use Razorpay\Api\Api;
use Stripe\Charge;
use Stripe\Stripe;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentLogController extends Controller
{

    public function order_payment_form(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'order_id' => 'required|string',
            'payment_gateway' => 'required|string',
        ]);
        $order_details = Order::find($request->order_id);
        $payment_log_id = PaymentLogs::create([
            'email' => $request->email,
            'name' => $request->name,
            'package_name' => $order_details->package_name,
            'package_price' => $order_details->package_price,
            'package_gateway' => $request->payment_gateway,
            'order_id' => $request->order_id,
            'status' => 'pending',
            'track' => Str::random(10) . Str::random(10),
        ])->id;
        $payment_details = PaymentLogs::find($payment_log_id);

        if ($request->payment_gateway === 'paypal') {

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
                'amount' => $payment_details->package_price,
                'description' => 'Payment For Package Order Id: #' . $request->order_id . ' Package Name: ' . $payment_details->package_name . ' Payer Name: ' . $request->name . ' Payer Email:' . $request->email,
                'item_name' => 'Payment For Package Order Id: #'.$request->order_id,
                'ipn_url' => route('frontend.paypal.ipn'),
                'cancel_url' => route('frontend.order.payment.cancel',$payment_details->id),
                'payment_track' => $payment_details->track,
            ]);

            session()->put('order_id',$request->order_id);
            return redirect()->away($redirect_url);

        } elseif ($request->payment_gateway === 'paytm') {

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
                'order_id' => $payment_details->track,
                'email' => $payment_details->email,
                'name' => $payment_details->name,
                'amount' => $payment_details->package_price,
                'callback_url' => route('frontend.paytm.ipn')
            ]);
            return $redirect_url;

        } elseif ($request->payment_gateway === 'mollie') {

            /**
             * @required param list
             * amount
             * description
             * redirect_url
             * order_id
             * track
             * */
            $return_url =  mollie_gateway()->charge_customer([
                'amount' => $payment_details->package_price,
                'description' => 'Payment For Order Id: #' . $request->order_id . ' Package Name: ' . $payment_details->package_name . ' Payer Name: ' . $request->name . ' Payer Email:' . $request->email,
                'web_hook' => route('frontend.mollie.webhook'),
                'order_id' => $payment_details->order_id,
                'track' => $payment_details->track,
            ]);
            return $return_url;

        } elseif ($request->payment_gateway === 'stripe') {

            $stripe_data['order_id'] = $payment_details->order_id;
            $stripe_data['route'] = route('frontend.stripe.charge');
            return view('payment.stripe')->with('stripe_data', $stripe_data);

        } elseif ($request->payment_gateway === 'razorpay') {

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
                'price' => $payment_details->package_price,
                'title' => $payment_details->package_name,
                'description' => 'Payment For Package Order Id: #'.$payment_details->id.' Plan Name: '.$payment_details->package_name.' Payer Name: '.$payment_details->name.' Payer Email:'.$payment_details->email,
                'route' => route('frontend.razorpay.ipn'),
                'order_id' => $payment_details->order_id
            ]);
            return $redirect_url;

        } elseif ($request->payment_gateway === 'flutterwave') {

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
                'name' => $payment_details->package_name,
                'email' => $payment_details->email,
                'order_id' => $payment_details->order_id,
                'amount' => $payment_details->package_price,
                'track' => $payment_details->track,
                'description' =>  'Payment For Order Id: #'.$payment_details->id.' Package Name: '.$payment_details->package_name.' Payer Name: '.$payment_details->name.' Payer Email:'.$payment_details->email,
                'ipn_route' => route('frontend.flutterwave.pay'),
            ]);
            return $view_file;

        } elseif ($request->payment_gateway == 'paystack') {

            $order = Order::where('id', $request->order_id)->first();
            $package_details = PaymentLogs::where('order_id', $order->id)->first();

            $payable_amount = $payment_details->package_price;
            $currency_code = get_static_option('site_global_currency');

            if (!is_paystack_supported_currency()) {
                $payable_amount = get_amount_in_ngn($payment_details->package_price, get_static_option('site_global_currency'));
                $currency_code = 'NGN';
            }

            $paystack_data['currency'] = $currency_code;
            $paystack_data['price'] = $payable_amount;
            $paystack_data['package_name'] = $order->package_name;
            $paystack_data['name'] = $package_details->name;
            $paystack_data['email'] = $package_details->email;
            $paystack_data['order_id'] = $order->id;
            $paystack_data['track'] = $package_details->track;
            $paystack_data['route'] = route('frontend.paystack.pay');
            $paystack_data['type'] = 'order';

            return view('frontend.payment.paystack')->with(['paystack_data' => $paystack_data]);

        } elseif ($request->payment_gateway == 'manual_payment') {
            $order = Order::where('id', $request->order_id)->first();
            $order->status = 'pending';
            $order->save();
            PaymentLogs::where('order_id', $request->order_id)->update(['transaction_id' => $request->transaction_id]);
            return redirect()->route('frontend.order.payment.success', $request->order_id);
        }

        return redirect()->route('homepage');
    }

    public function paypal_ipn(Request $request)
    {
        $package_order_id = session()->get('order_id');
        session()->forget('order_id');
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
            'cancel_url' => route('frontend.order.payment.cancel',$package_order_id),
            'success_url' => route('frontend.order.payment.success',$package_order_id)
        ]);
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $this->update_database($package_order_id, $payment_data['transaction_id']);
            $this->send_order_mail($package_order_id);
            $order_id = Str::random(6) . $package_order_id . Str::random(6);
            return redirect()->route('frontend.order.payment.success',$order_id);
        }
        return redirect()->route('frontend.order.payment.cancel',$package_order_id);
    }

    public function razorpay_ipn(Request $request)
    {

        $payment_details = PaymentLogs::where('order_id',$request->order_id)->first();
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
            $this->update_database($payment_details->order_id, $payment_data['transaction_id']);
            $this->send_order_mail($payment_details->order_id);
            $order_id = Str::random(6) . $payment_details->order_id. Str::random(6);
            return redirect()->route('frontend.order.payment.success',$order_id);
        }
        return redirect()->route('frontend.order.payment.cancel',$payment_details->order_id);
    }

    public function paytm_ipn(Request $request)
    {

        $order_id = $request['ORDERID'];
        $payment_logs = PaymentLogs::where( 'track', $order_id )->first();
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
            $this->update_database($payment_logs->order_id, $payment_data['transaction_id']);
            $this->send_order_mail($payment_logs->order_id);
            $order_id = Str::random(6) . $payment_logs->order_id . Str::random(6);
            return redirect()->route('frontend.order.payment.success',$order_id);
        }
        return redirect()->route('frontend.order.payment.cancel',$payment_logs->id);
    }

    public function mollie_webhook()
    {

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
            return redirect()->route('frontend.order.payment.success',$order_id);
        }
        abort(404);
    }

    public function stripe_ipn(Request $request){
        /**
         * @require params
         * */
        $order_id = session()->get('stripe_order_id');
        session()->forget('stripe_order_id');

        $payment_data = stripe_gateway()->ipn_response();
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $this->update_database($order_id, $payment_data['transaction_id']);
            $this->send_order_mail($order_id);
            $encoded_order_id = Str::random(6) . $order_id . Str::random(6);
            return redirect()->route('frontend.order.payment.success',$encoded_order_id);
        }
        return redirect()->route('frontend.order.payment.cancel',$order_id);
    }

    public function stripe_charge(Request $request)
    {
        $order_details = PaymentLogs::where('order_id',$request->order_id)->first();

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
            'product_name' => $order_details->package_name,
            'amount' => $order_details->package_price,
            'description' => 'Payment From '. get_static_option('site_'.get_default_language().'_title').'. Package Order ID #'.$order_details->id .', Payer Name: '.$order_details->name.', Payer Email: '.$order_details->email,
            'ipn_url' => route('frontend.stripe.ipn'),
            'order_id' => $request->order_id,
            'cancel_url' => route('frontend.order.payment.cancel',$request->order_id)
        ]);
        return response()->json(['id' => $stripe_session['id']]);
    }

    public function flutterwave_pay(Request $request)
    {
        Rave::initialize(route('frontend.flutterwave.callback'));
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
            $payment_log = PaymentLogs::where( 'track', $payment_data['track'] )->first();
            $this->update_database($payment_log->order_id, $payment_data['transaction_id']);
            $this->send_order_mail($payment_log->order_id);
            $order_id = Str::random(6) . $payment_log->order_id . Str::random(6);
            return redirect()->route('frontend.order.payment.success',$order_id);
        }
        abort(404);
    }

    public function paystack_pay()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    public function paystack_callback(Request $request)
    {

        /**
         * return params
         * transaction_id
         * type
         * track
         * */

        $payment_data = paystack_gateway()->ipn_response();
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete') {
            $func_name = 'update_data_and_mail_' . $payment_data['type'];
            return $this->$func_name($payment_data);
        }
        abort(404);

//        $paymentDetails = Paystack::getPaymentData();
//
//        if ($paymentDetails['status']){
//            $meta_data = $paymentDetails['data']['metadata'];
//
//            if (empty($meta_data['track'])){return redirect(route('homepage'));}
//
//            if ($meta_data['type'] == 'order'){
//                $payment_log_details = PaymentLogs::where('track',$meta_data['track'])->first();
//                $order_details = Order::find($payment_log_details->order_id);
//                // Do something here for store payment details in database...
//                $order_details->payment_status = 'complete';
//                $order_details->save();
//
//                PaymentLogs::where('track',$meta_data['track'])->update([
//                    'transaction_id' => $paymentDetails['data']['reference'],
//                    'status' => 'complete'
//                ]);
//
//                //send mail to user
//                self::send_order_mail($order_details->id);
//                Mail::to($payment_log_details->email)->send(New PaymentSuccess($payment_log_details));
//                return redirect()->route('frontend.order.payment.success',$payment_log_details->order_id);
//
//            }elseif ($meta_data['type'] == 'event'){
//                $payment_log_details = EventPaymentLogs::where('track',$meta_data['track'])->first();
//                $order_details = EventAttendance::find($payment_log_details->attendance_id);
//                //update event attendance status
//                $order_details->payment_status = 'complete';
//                $order_details->status = 'complete';
//                $order_details->save();
//                //update event payment log
//                $payment_log_details->transaction_id = $paymentDetails['data']['reference'];
//                $payment_log_details->status = 'complete';
//                $payment_log_details->save();
//
//                //update event available tickets
//                $event_details = Events::find($order_details->event_id);
//                $event_details->available_tickets = intval($event_details->available_tickets) - $order_details->quantity;
//                $event_details->save();
//
//                //send mail to user
//                Mail::to($payment_log_details->email)->send(New PaymentSuccess($payment_log_details,'event'));
//                return redirect()->route('frontend.event.payment.success',$payment_log_details->attendance_id);
//
//            }elseif ($meta_data['type'] == 'donation'){
//
//                $payment_log_details = DonationLogs::where('track',$meta_data['track'])->first();
//                //update event attendance status
//
//                $payment_log_details->transaction_id = $paymentDetails['data']['reference'];
//                $payment_log_details->status = 'complete';
//                $payment_log_details->save();
//
//                //update donation raised amount
//                $event_details = Donation::find($payment_log_details->donation_id);
//                $event_details->raised = intval($event_details->raised) + intval($payment_log_details->amount);
//                $event_details->save();
//
//                $donation_details = DonationLogs::find($payment_log_details->id);
//                Mail::to(get_static_option('site_global_email'))->send(new DonationMessage($donation_details,__('You have a new donation payment from '.get_static_option('site_'.get_default_language().'_title')),'owner'));
//                Mail::to(get_static_option('donation_notify_mail'))->send(new DonationMessage($donation_details,__('You donation payment success for '.get_static_option('site_'.get_default_language().'_title')),'customer'));
//
//                return redirect()->route('frontend.donation.payment.success',$payment_log_details->id);
//
//            }elseif ($meta_data['type'] == 'product'){
//
//                $product_order_details = ProductOrder::where('payment_track',$meta_data['track'])->first();
//                $product_order_details->transaction_id = $paymentDetails['data']['reference'];
//                $product_order_details->payment_status = 'complete';
//                $product_order_details->save();
//                rest_cart_session();
//
//                Mail::to(get_static_option('site_global_email'))->send(new \App\Mail\ProductOrder($product_order_details,'owner',__('You Have A New Product Order From ').get_static_option('site_'.get_default_language().'_title')));
//                Mail::to($product_order_details->billing_email)->send(new \App\Mail\ProductOrder($product_order_details,'customer',__('You order has been placed in ').get_static_option('site_'.get_default_language().'_title')));
//
//                return redirect()->route('frontend.product.payment.success',$product_order_details->id);
//
//            }elseif ($meta_data['type'] == 'gig'){
//
//                $product_order_details = GigOrder::where('payment_track',$meta_data['track'])->first();
//                $product_order_details->transaction_id = $paymentDetails['data']['reference'];
//                $product_order_details->payment_status = 'complete';
//                $product_order_details->save();
//
//                $default_lang = get_default_language();
//                Mail::to($product_order_details->email)->send(new \App\Mail\GigOrder($product_order_details,'customer',__('Your order has been placed in ').get_static_option('site_'.$default_lang.'_title')));
//                Mail::to(get_static_option('site_global_email'))->send(new \App\Mail\GigOrder($product_order_details,'owner',__('Your have a new gig order in ').get_static_option('site_'.$default_lang.'_title')));
//
//                return redirect()->route('frontend.gig.order.payment.success',$product_order_details->id);
//            }
//            else{
//                return redirect()->route('homepage');
//            }
//        }else{
//            return redirect()->route('homepage');
//        }
    }

    public function update_data_and_mail_donation($payment_data){
                $payment_log_details = DonationLogs::where('track',$payment_data['track'])->first();
                //update event attendance status

                $payment_log_details->transaction_id = $payment_data['transaction_id'];
                $payment_log_details->status = 'complete';
                $payment_log_details->save();

                //update donation raised amount
                $event_details = Donation::find($payment_log_details->donation_id);
                $event_details->raised = (int)$event_details->raised + (int)$payment_log_details->amount;
                $event_details->save();

                $donation_details = DonationLogs::find($payment_log_details->id);
                Mail::to(get_static_option('site_global_email'))->send(new DonationMessage($donation_details,__('You have a new donation payment from '.get_static_option('site_'.get_default_language().'_title')),'owner'));
                Mail::to(get_static_option('donation_notify_mail'))->send(new DonationMessage($donation_details,__('You donation payment success for '.get_static_option('site_'.get_default_language().'_title')),'customer'));

                return redirect()->route('frontend.donation.payment.success',Str::random(6).$payment_log_details->id.Str::random(6));
    }
    public function update_data_and_mail_gig($payment_data)
    {
        GigOrder::where('payment_track', $payment_data['track'])->update([
            'transaction_id' => $payment_data['transaction_id'],
            'payment_status' => 'complete'
        ]);

        $product_order_details = GigOrder::where('payment_track', $payment_data['track'])->first();
        $default_lang = get_default_language();
        Mail::to($product_order_details->email)->send(new \App\Mail\GigOrder($product_order_details, 'customer', __('Your order has been placed in ') . get_static_option('site_' . $default_lang . '_title')));
        Mail::to(get_static_option('site_global_email'))->send(new \App\Mail\GigOrder($product_order_details, 'owner', __('Your have a new gig order in ') . get_static_option('site_' . $default_lang . '_title')));
        $order_id = Str::random(6) . $product_order_details->id . Str::random(6);
        return redirect()->route('frontend.gig.order.payment.success', $order_id);
    }
    public function update_data_and_mail_event($payment_data)
    {
        $payment_log_details = EventPaymentLogs::where('track',$payment_data['track'])->first();
        $order_details = EventAttendance::findOrFail($payment_log_details->attendance_id);
        //update event attendance status
        $order_details->payment_status = 'complete';
        $order_details->status = 'complete';
        $order_details->save();
        //update event payment log
        $payment_log_details->transaction_id = $payment_data['transaction_id'];
        $payment_log_details->status = 'complete';
        $payment_log_details->save();

        //update event available tickets
        $event_details = Events::find($order_details->event_id);
        $event_details->available_tickets = (int)$event_details->available_tickets - $order_details->quantity;
        $event_details->save();

        //send mail to user
        Mail::to($payment_log_details->email)->send(New PaymentSuccess($payment_log_details,'event'));
        return redirect()->route('frontend.event.payment.success',Str::random(6).$payment_log_details->attendance_id.Str::random(6));
    }

    public function update_data_and_mail_product($payment_data)
    {
        ProductOrder::where('payment_track', $payment_data['track'])->update([
            'transaction_id' => $payment_data['transaction_id'],
            'payment_status' => 'complete'
        ]);
        rest_cart_session();
        $default_lang = get_default_language();
        $site_title = get_static_option('site_'.$default_lang.'_title');
        $product_order_details =  ProductOrder::where('payment_track', $payment_data['track'])->first();
        Mail::to(get_static_option('site_global_email'))->send(new \App\Mail\ProductOrder($product_order_details,'owner',__('You Have A New Product Order From ').$site_title));
        Mail::to($product_order_details->billing_email)->send(new \App\Mail\ProductOrder($product_order_details,'customer',__('You order has been placed in ').$site_title));
        return redirect()->route('frontend.product.payment.success',Str::random(6).$product_order_details->id.Str::random(6));
    }

    public function send_order_mail($order_id)
    {

        $order_details = Order::find($order_id);
        $package_details = PricePlan::where('id', $order_details->package_id)->first();
        $all_fields = unserialize($order_details->custom_fields,['class'=> false]);
        unset($all_fields['package']);

        $all_attachment = unserialize($order_details->attachment,['class'=> false]);
        $order_mail = get_static_option('order_page_form_mail') ? get_static_option('order_page_form_mail') : get_static_option('site_global_email');

        Mail::to($order_mail)->send(new PlaceOrder($all_fields, $all_attachment, $package_details));
    }

    private function update_database($order_id, $transaction_id)
    {
        Order::where('id', $order_id)->update(['payment_status' => 'complete']);
        PaymentLogs::where('order_id', $order_id)->update([
            'transaction_id' => $transaction_id,
            'status' => 'complete'
        ]);

    }

}
