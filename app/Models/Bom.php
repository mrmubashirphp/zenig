<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bom extends Model
{
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function bom_material(){
        return $this->hasMany(BomMaterial::class, 'bom_id', 'id');
    } 
    public function bom_circuit(){
        return $this->hasMany(BomCircuit::class, 'bom_id', 'id');
    } 
    public function bom_process(){
        return $this->hasMany(BomProcess::class, 'bom_id', 'id');
    } 
}
