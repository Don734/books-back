<?php

namespace App\Payment\Apelsin;

use App\Order;
use App\Payment\Transaction;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Cookie\CookieJar;
use Illuminate\Support\Facades\Redirect;

class Apelsin
{
    public function __construct() {
        $this->base_url = config('apelsin.base_url');
        $this->cash = config('apelsin.cash');
    }

    
}