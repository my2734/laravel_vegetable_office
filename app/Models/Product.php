<?php

namespace App\Models;
use App\Models\Category;
use App\Models\Product_Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CommentPro;
use App\Models\Warehouse;

class Product extends Model
{
    use HasFactory;
    protected $table = "product";
    public $timestamps = false;

    public function product_image(){
        return $this->hasMany(Product_Image::class);
    }
    // public function tagses(){
    //     return $this->belongsToMany(Tags::class,'blog_tags','blog_id','tags_id');
    // }

    // public function product_image(){
    //     return $this->belongsToMany(Tags::class,'blog_tags','blog_id','tags_id');
    // }

    public function category(){
        return $this->belongsTo(Category::class,'cat_id','id');
    }

    public function warehouse(){
        return $this->hasOne(Warehouse::class,'product_id', 'id');
    }

    public function comment(){
        return $this->hasMany(CommentPro::class);
    }
}
