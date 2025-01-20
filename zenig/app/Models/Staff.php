<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'full_name',
        'user_name',
        'email',
        'password',
        'department',
        'designation',
        'role',
        'is_active',
        'gender', 'marital_status', 'passport', 'passport_expiry', 'address', 'ethnic', 'immigration_no', 'immigration_expiry',
        'dob', 'age', 'permit_no', 'permit_expiry', 'phone', 'mobile', 'epf_no', 'sosco', 'nric', 'nationality',
        'tax_identification_no', 'base_salary', 'spouse_name', 'spouse_nric', 'spouse_passport', 'spouse_passport_expiry',
        'spouse_dob', 'spouse_age', 'spouse_permit_no', 'spouse_permit_expiry', 'spouse_address', 'children_no',
        'bank_name', 'account_no', 'account_type', 'branch', 'account_status',
        'emergency_name', 'relationship', 'emergency_address', 'emergency_phone_no',
        'annual_leave', 'annual_balance', 'carried_leave', 'carried_balance', 'medical_leave', 'medical_balance',
        'unpaid_leave', 'unpaid_balance', 'total_leave_days', 'charges_exceeded'
    ];

    // Relationships
    // If you prefer to keep them as separate entities and not mix everything in one table, you can still use the relationships
    // but add the attributes as needed in $fillable for easy mass assignment.

    public function personalData()
    {
        return $this->hasOne(PersonalData::class);
    }

    public function familyData()
    {
        return $this->hasOne(FamilyData::class);
    }

    public function bankData()
    {
        return $this->hasOne(BankData::class);
    }

    public function moreData()
    {
        return $this->hasOne(More::class);
    }
}
