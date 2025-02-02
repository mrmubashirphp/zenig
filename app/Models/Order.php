<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'status',
        'order_month',
        'order_no',
        'created_by',
        'created_date',
        // other fields...
    ];

    /**
     * Define the relationship with products.
     */

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
    public function order_product()
    {
        return $this->hasMany(OrderProduct::class,'order_id','id');
    }
}
