<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TextUsPartnerEnquiry extends Model
{
    use HasFactory, SoftDeletes;

    public function residence_name()
    {
        return $this->belongsTo(Country::class,'residence');
    }
}
