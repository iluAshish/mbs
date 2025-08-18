<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use HasFactory, SoftDeletes;

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }
        // Product model
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
     public function brand()
    {
        return $this->belongsTo(ProductBrands::class, 'brand_id');
    }
}
