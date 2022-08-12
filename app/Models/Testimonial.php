<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'profession', 'description', 'image'];

    public function image_upload($image)
    {
        $image_name = $image->getClientOriginalName();
        $upload_path = 'public/images';
        $success = $image->storeAs($upload_path, $image_name);
        return $image_name;
    }
    public static function testimonial()
    {
        return Testimonial::all();
    }
}
