<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class Team extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'designation', 'image', 'instagram', 'linkedin', 'twitter', 'facebook','status'];

    
    public function image_upload($image)
    {
        $image_name = Str::random(4).$image->getClientOriginalName();
        
        $upload_path = 'public/images';
        $success = $image->storeAs($upload_path, $image_name);
        return $image_name;
        
    }

}
