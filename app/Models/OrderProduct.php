<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_products'; // Correct table name

    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'sst_percent',
        'sst_value',
        'firm_qty',
        'forecast_qty_1',
        'forecast_qty_2',
        'forecast_qty_3',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
