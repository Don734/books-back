<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use App\Traits\EloquentHelper;

class Order extends Model
{
    use HasFactory, EloquentHelper;

    const CREATED = "CREATED";
    const WAITING_FOR_PAYMENT = "WAITING_FOR_PAYMENT";
    const PAYMENT_PROCESSING = "PAYMENT_PROCESSING";
    const PAYMENT_RECEIVED = "PAYMENT_RECEIVED";
    const WAITING_FOR_COD_APPROVAL = "WAITING_FOR_COD_APPROVAL";

    const APPROVED = "APPROVED";
    const PROCESSING = "PROCESSING";
    const COMPLETED = "COMPLETED";
    const CANCELLED = "CANCELLED";

    // const DELIVERY_STANDART = "DELIVERY_STANDART";
    // const DELIVERY_PICKUP = "DELIVERY_PICKUP";
    // const DELIVERY_EXPRESS = "DELIVERY_EXPRESS";
    // const DELIVERY_COD = "DELIVERY_COD";

    public function remove()
    {
        $this->delete();
        
        return $this->id;
    }

    public function orderHasProducts()
    {
        return $this->hasMany(OrderHasProduct::class);
    }
}
