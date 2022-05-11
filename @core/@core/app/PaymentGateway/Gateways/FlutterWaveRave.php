<?php


namespace App\PaymentGateway\Gateways;


use App\JobApplicant;
use App\PaymentGateway\PaymentGatewayBase;
use KingFlamez\Rave\Facades\Rave;

class FlutterWaveRave extends PaymentGatewayBase
{
    /**
     * this payment gateway will not work without this package
     * @ https://github.com/kingflamez/laravelrave
     * */
    public function charge_amount($amount)
    {
        // TODO: Implement charge_amount() method.
        if (in_array(self::global_currency(), $this->supported_currency_list())){
            return $amount;
        }
        return self::get_amount_in_usd($amount);
    }

    /**
     *
     * @param array $args
     * @required param list
     * request
     *
     * @return array
     */
    public function ipn_response(array $args)
    {
        // TODO: Implement ipn_response() method.
        $response = json_decode($args['request']->resp);
        $txRef =$response->data->transactionobject->txRef;
        $data = Rave::verifyTransaction($txRef);
        $chargeResponsecode = $data->data->chargecode;
        $meta_data = $data->data->meta;
        $track = '';
        $order_id = '';

        foreach ($meta_data as $meta){
            switch ($meta->metaname){
                case ('order_id'):
                    $order_id = $meta->metavalue;
                    break;
                case ('track'):
                    $track = $meta->metavalue;
                    break;
                default:
                    break;
            }
        }

        if (in_array($chargeResponsecode, ['00', '0'], false)){
            return $this->verified_data([
                'status' => 'complete',
                'transaction_id' => $txRef,
                'track' => $track,
                'order_id' => $order_id,
            ]);
        }

        return ['status' => 'failed'];
    }

    /**
     *
     * @param array $args
     * name
     * email
     * ipn_route
     * amount
     * description
     * order_id
     * track
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function charge_customer(array $args)
    {
        // TODO: Implement charge_customer() method.
        $flutterwave_data['currency'] = $this->charge_currency();
        $flutterwave_data['name'] = $args['name'];
        $flutterwave_data['email'] = $args['email'];
        $flutterwave_data['form_action'] = $args['ipn_route'];
        $flutterwave_data['amount'] = $this->charge_amount($args['amount']);
        $flutterwave_data['description'] = $args['description'];
        $flutterwave_data['country'] = $this->get_visitor_country() ?? 'NG';
        $flutterwave_data['metadata'] = [
            ['metaname' => 'order_id', 'metavalue' => $args['order_id']],
            ['metaname' => 'track', 'metavalue' => $args['track']],
        ];
        return view('payment.flutterwave')->with('flutterwave_data', $flutterwave_data);
    }

    public function supported_currency_list()
    {
        // TODO: Implement supported_currency_list() method.
        return ['BIF', 'CAD', 'CDF', 'CVE', 'EUR', 'GBP', 'GHS', 'GMD', 'GNF', 'KES', 'LRD', 'MWK', 'MZN', 'NGN', 'RWF', 'SLL', 'STD', 'TZS', 'UGX', 'USD', 'XAF', 'XOF', 'ZMK', 'ZMW', 'ZWD'];

    }

    public function charge_currency()
    {
        // TODO: Implement charge_currency() method.
        if (in_array(self::global_currency(), $this->supported_currency_list())) {
            return self::global_currency();
        }
        return "USD";
    }

    public function gateway_name()
    {
        // TODO: Implement geteway_name() method.
        return 'flutterwaverave';
    }

    public function get_visitor_country()
    {
        $return_val = 'NG';
        $ip = getVisIpAddr();
        $ipdat = @json_decode(file_get_contents(
            "http://www.geoplugin.net/json.gp?ip=" . $ip));

        $ipdat = (array)$ipdat;
        $return_val = isset($ipdat['geoplugin_countryCode']) ? $ipdat['geoplugin_countryCode'] : $return_val;

        return $return_val;
    }
}