<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasePrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'date',
        'status',
        'product_id', // Ensure product_id is fillable
    ];

    /**
     * Get the product associated with the purchase price.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
