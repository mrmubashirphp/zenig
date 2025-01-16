<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaRack extends Model
{
    public function arealevel()
    {
        return $this->belongsTo(AreaLevel::class, 'arealevel_id', 'id');
    }
}
