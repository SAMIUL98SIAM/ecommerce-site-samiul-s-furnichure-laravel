<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    public function payment()
    {
        return $this->BelongsTo(Payment::class,'payment_id','id');
    }

    public function shipping()
    {
        return $this->BelongsTo(Shipping::class,'shipping_id','id');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
}
