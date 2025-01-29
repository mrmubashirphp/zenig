<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BomProcess extends Model
{
    public function processes(){
        return $this->belongsTo(Process::class, 'process_id', 'id');
    } 
}
