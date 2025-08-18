<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
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
    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id'); // Assuming 'parent_id' references parent category
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id'); // Assuming 'category_id' references this category
    }
    
}
