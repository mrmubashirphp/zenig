<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'part_no',
        'part_name',
        'type_of_product_id',
        'model',
        'category_id',
        'variance',
        'description',
        'moq',
        'unit_id',
        'part_weight',
        'standard_packaging',
        'customer_or_supplier',
        'customer_id',
        'customer_product_code',
        'have_bom',
    ];

    // Relationships
    public function typeOfProduct()
    {
        return $this->belongsTo(TypeOfProduct::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
