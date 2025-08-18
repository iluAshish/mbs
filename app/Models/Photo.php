<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use HasFactory,SoftDeletes;

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    public function activeGalleries()
    {
        return $this->hasMany(PhotoGallery::class)->orderBy('sort_order')->active();
    }
}
