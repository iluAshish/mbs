<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceFaqconnect extends Model
{
    use HasFactory,SoftDeletes;
    protected $table ='service_faq_connect';
    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    
}