<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use \Conner\Tagging\Taggable;
    use HasFactory;
    protected $fillable = ['title', 'description', 'image', 'category', 'postable_id', 'meta_description', 'meta_keywords', 'meta_title', 'slug'];

    public function image_upload($image)
    {
        $image_name = Str::random(4).$image->getClientOriginalName();
        $upload_path = 'public/images';
        $success = $image->storeAs($upload_path, $image_name);
        return $image_name;
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->latest()->take(3);
    }
    public static function  allBlogs()
    {
        return $blogs = Blog::all();
    }
}
