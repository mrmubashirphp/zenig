<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankData extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow the Laravel convention (plural of model name)
    protected $table = 'bank_data';

    protected $fillable = [
        'staff_id', // Foreign key to staff
        'bank_name',
        'account_no',
        'account_type',
        'branch',
        'account_status',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
