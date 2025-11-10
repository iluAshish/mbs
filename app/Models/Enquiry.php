<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enquiry extends Model
{
    use HasFactory, SoftDeletes;

    public function service(){
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function brand(){
        return $this->belongsTo(ProductBrands::class, 'brand_id', 'id');
    }
}
