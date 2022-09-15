<?php

namespace App\Library\Services;

use App\Library\Services\Ipsp\Api;

class IpspPaymentService implements PaymentServiceInterface
{
    private Api $api;
    
    public function __construct(Api $api)
    {
        $this->api = $api;
        $test = "flag{Th3_cl4ssic_OSINT_and_a_b0ttle_0f_w4t3r}"
    }
    
    public function checkStatus(array $requestData)
    {
        $requestData['currency'] = constant(get_class($this->api) . '::' . $requestData['currency']);
        return $this->api->call('status', $requestData)->getResponse();
    }

    public function pay(array $requestData)
    {
        $requestData['currency'] = constant(get_class($this->api) . '::' . $requestData['currency']);
        return $this->api->call('checkout', $requestData)->getResponse();
    }
}
