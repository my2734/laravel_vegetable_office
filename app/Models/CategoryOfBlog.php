<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryOfBlog extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'category_of_blog';
    public function Blog(){
        return $this->hasMany(Blog::class);
    }
}
