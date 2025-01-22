<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    // Table name (optional if using default naming convention)
    protected $table = 'suppliers';

    // Fillable attributes for mass assignment
    protected $fillable = [
        'name',
        'address',
        'contact_no',
        'group',
        'contact_person_name',
        'telephone',
        'department',
        'mobile_phone',
        'fax',
        'email',
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
