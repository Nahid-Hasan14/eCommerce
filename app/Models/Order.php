<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderStatus;
use App\Models\Customer;
use App\Models\PaymentMethod;
use App\Models\PaymentStatus;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'shipping_address',
        'order_number',
        'total_price',
        'order_status_id',
        'payment_method_id',
        'payment_status_id',
    ];

     /**
     * Get the phone associated with the user.
     */
    public function OrderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function PaymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }
    public function PaymentStatus()
    {
        return $this->belongsTo(PaymentStatus::class, 'payment_status_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class)->select('name','email');
    }
}
