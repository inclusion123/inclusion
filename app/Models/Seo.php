<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;
    protected $fillable = ['route_name', 'meta_title', 'meta_keywords', 'meta_description'];

    public static function seo($route_name)
    {
        return Seo::where('route_name', $route_name)->first();
    }
}
