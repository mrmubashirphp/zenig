<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id', 'gender', 'marital_status', 'passport', 'passport_expiry',
        'address', 'ethnic', 'immigration_no', 'immigration_expiry', 'dob',
        'age', 'permit_no', 'permit_expiry', 'phone', 'mobile', 'epf_no',
        'sosco', 'nric', 'nationality', 'tax_identification_no', 'base_salary'
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
