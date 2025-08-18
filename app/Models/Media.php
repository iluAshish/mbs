<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'media';

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    public function images()
    {
        return $this->hasMany(MediaGallery::class, 'media_id', 'id');
    }
}
