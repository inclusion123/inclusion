<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'title',
        'title_description',
        'download_link',
        'discription',
        'status',
        'highlight_details',
        'included',
        'features',
        'featured_image',
    ];

}
