<?php

namespace App\Models;
use App\Models\CategoryOfBlog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = "blogs";
    public $timestamps = false;

    public function category_of_blog(){
        return $this->belongsTo(CategoryOfBlog::class,'cat_id','id');
    }

    public function tagses(){
        return $this->belongsToMany(Tags::class,'blog_tags','blog_id','tags_id');
    }
}
