<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

    public function qoutation_detail()
    {
        return $this->hasMany(QuotationDetil::class,'quotation_id','id');
    }
    
}
