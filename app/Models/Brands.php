<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brands extends Model
{
    use HasFactory, SoftDeletes;

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }
}
