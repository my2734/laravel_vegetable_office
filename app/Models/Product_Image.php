<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Image extends Model
{
    use HasFactory;
    protected $table = 'product_image';
    public $timestamps = false;
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
