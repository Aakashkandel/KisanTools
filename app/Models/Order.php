<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'cart_ids', 'status', 'payment_method', 'payment_status', 'order_date','total_amount'
    ];

    protected $casts = [
        'cart_ids' => 'array', // Automatically cast JSON to array
    ];
}
