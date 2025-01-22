<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class More extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id', 'emergency_name', 'relationship', 'address', 'phone_no',
        'annual_leave', 'annual_balance', 'carried_leave', 'carried_balance',
        'medical_leave', 'medical_balance', 'unpaid_leave', 'unpaid_balance',
        'total_leave_days', 'charges_exceeded'
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
