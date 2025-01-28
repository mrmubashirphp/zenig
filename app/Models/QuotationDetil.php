<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotationDetil extends Model
{
 
 
    public function products()
    {
        return $this->belongsTo(Product::class,'product_id','id'); // Ensure Product model is correctly linked
    }   //
}
