<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class AboutUs extends Model
{
    use HasFactory;
    protected $fillable = ['heading','name','title','description','image'];
    public function image_upload($image)
    {

        // Log::info('child Service image_upload');
        $image_name = $image->getClientOriginalName();
        // Log::info($image_name);
        $upload_path = 'public/images';
        $success = $image->storeAs($upload_path, $image_name);
        return $image_name;
    }
    public function aboutus()
    {
      return AboutUs::first();
    }
}
