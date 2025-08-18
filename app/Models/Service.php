<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    public function sub()
    {
        return $this->hasMany(SELF::class, 'parent_id')->active();
    }

    public function parent()
    {
        return $this->belongsTo(SELF::class);
    }

    public function syncGallery()
    {
        return $this->belongsToMany(
            PortfolioGallery::class,
            'service_galleries',
            'service_id',
            'portfolio_gallery_id'
        );
    }

    public function activeFaqs()
    {
        return $this->hasMany(ServiceFaq::class)->active();
    }
    public function getDescriptionShortAttribute()
    {
        if ($this->short_description)
            return Str::words($this->short_description, 30, '...');
        else
            return Str::words($this->description, 30, '...');
    }
}
