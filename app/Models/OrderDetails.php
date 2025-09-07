<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', // Add this line to allow mass assignment for order_id
        'product_id',
        'quantity',
        'price',
        'status',
        'total'
    ];
}
