<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function invoice_detail(){
        return $this->hasMany(InvoiceDetail::class, 'invoice_id', 'id');
    } 
    public function customer(){
        return $this->belongsTo(Customer::class, 'cutomer_id', 'id');
    } 
}
