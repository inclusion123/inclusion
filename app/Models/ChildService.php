<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use App\Models\Service;

class ChildService extends Model
{
    use HasFactory;
    protected $fillable = ['service_id', 'name', 'description', 'image'];
    public function image_upload($image)
    {

        Log::info('child Service image_upload');
        $image_name = $image->getClientOriginalName();
        Log::info($image_name);
        $upload_path = 'public/images';
        $success = $image->storeAs($upload_path, $image_name);
        return $image_name;
    }
   
}
