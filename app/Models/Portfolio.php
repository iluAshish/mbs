<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    use HasFactory, SoftDeletes;

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    public function gallery()
    {
        return $this->hasMany(PortfolioGallery::class);
    }

    public function activeGalleries()
    {
        return $this->hasMany(PortfolioGallery::class)->active();
    }

    public function galleryFirstItem()
    {
        return $this->hasOne(PortfolioGallery::class)->active()->orderBy('sort_order');
    }
}
