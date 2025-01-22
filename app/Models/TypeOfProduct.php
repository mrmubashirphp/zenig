<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeOfProduct extends Model
{
    protected $table = 'type_of_products';
    protected $primarykey = 'id';
    protected $fillable = ['name','code_input'];
}
