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
    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class)->select('id', 'name');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id')->select('id', 'name');
    }
    public function paymentStatus()
    {
        return $this->belongsTo(PaymentStatus::class, 'payment_status_id')->select('id', 'name');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class)->select('id', 'name','email');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
