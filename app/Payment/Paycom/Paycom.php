<?php

namespace App\Payment\Paycom;

class Paycom
{
    public function __construct()
    {
        $this->merchantId = config("paycom.merchant_id");
    }
}
