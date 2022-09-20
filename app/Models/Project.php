<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category_id', 'slug', 'image', 'link'];

    public function image_upload($image)
    {
        $image_name = Str::random(4).' -' . $image->getClientOriginalName();

        $upload_path = 'public/images';
        $success = $image->storeAs($upload_path, $image_name);
        return $image_name;
    }

    public function projectCategory()
    {
        return $this->belongsTo(ProjectCategory::class,'category_id');
    }
}
