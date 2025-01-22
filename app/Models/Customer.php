<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Table name (optional if using default naming convention)
    protected $table = 'customers';

    // Fillable attributes for mass assignment
    protected $fillable = [
        'name',
        'code',
        'phone_no',
        'address',
        'pic_name',
        'pic_department',
        'pic_phone_work',
        'pic_phone_mobile',
        'pic_fax',
        'pic_email',
        'payment_term',
    ];

    /**
     * Future relationship with Product model
     * This will be set once the Product model and migrations are defined.
     */
    public function products()
    {
        // return $this->hasMany(Product::class); // Placeholder for later adjustments
    }
}
