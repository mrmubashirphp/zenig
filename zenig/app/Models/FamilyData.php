<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyData extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'spouse_name',
        'spouse_nric',
        'spouse_passport',
        'spouse_passport_expiry',
        'spouse_dob',
        'spouse_age',
        'spouse_permit_no',
        'spouse_permit_expiry',
        'spouse_address',
        'children_no',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
