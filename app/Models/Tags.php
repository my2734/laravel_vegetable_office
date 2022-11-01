<?php

namespace App\Models;
use App\Models\Blog;
use App\Models\Blog_Tags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tags';

    public function blog(){
        return $this->belongsToMany(Blog::class,'blog_tags','tags_id','blog_id');
    }
}
