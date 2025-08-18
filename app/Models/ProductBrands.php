<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductBrands extends Model
{
    use HasFactory, SoftDeletes;

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }
    public function scopeShortUrl($query, $hort_url)
    {
        return $query->where('short_url', $hort_url);
    }
    public function subproductbrands()
    {
        return $this->hasMany(ProductBrands::class, 'parent_id', 'id');
    }

    public function scopeDisplayToMenu()
    {
       return $this->where('display_to_home', 'Yes');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }

    public function galleries()
    {
        return $this->hasMany(ProductBrandGallery::class, 'brand_id', 'id');
    }
}
