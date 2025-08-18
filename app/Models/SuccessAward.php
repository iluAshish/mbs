<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuccessAward extends Model
{
    use HasFactory, SoftDeletes;

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }
    public function successStory()
    {
        return $this->belongsTo(SuccessStory::class, 'success_story_id');
    }
}
