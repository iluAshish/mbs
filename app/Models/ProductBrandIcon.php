<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductBrandIcon extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product_brand_icon';

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }
    public function scopeShortUrl($query, $hort_url)
    {
        return $query->where('short_url', $hort_url);
    }
   
    public function productBarandIcon()
    {
        return $this->belongsTo(ProductBrands::class, 'brand_id', 'id');
    }
}