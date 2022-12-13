<?php

namespace App\Payment\Click;

class Click
{
    private $serviceId;
    private $merchantId;
    private $secretKey;
    private $locale;

    public function __construct()
    {
        $this->serviceId = config(".click.service_id");
        $this->merchantId = config("click.merchant_user_id");
        $this->secretKey = config("click.secret");
    }
}
