<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalePrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',        
        'part_no',           
        'part_name',         
        'model',             
        'variance',          
        'unit',              
        'price_per_unit',    
        'effective_date',    
        'status',           
    ];

    protected $casts = [
        'effective_date' => 'date',
    ];
    
public function product()
{
    return $this->belongsTo(Product::class);
}

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
    }

