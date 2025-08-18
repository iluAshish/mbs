<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MediaGallery extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'media_galleries';

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }
}
