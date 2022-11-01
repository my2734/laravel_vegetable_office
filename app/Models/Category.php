<?php

namespace App\Models;
use App\Models\Product;
use App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    public $timestamps = false;
    public function product(){
        return $this->hasMany(Product::class);
    }

    
}
