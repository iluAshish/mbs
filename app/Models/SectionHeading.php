<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionHeading extends Model
{
    use HasFactory;

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }
}
