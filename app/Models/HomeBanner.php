<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeBanner extends Model
{
    use HasFactory,SoftDeletes;

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    public function getFullTitleAttribute(){
        return $this->title1 . ' ' . $this->main_title . ' ' . $this->title2;
    }
}
