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

    public function category()
    {
        return $this->hasMany(Items_with_category::class);
    }
    public function tag()
    {
        return $this->hasMany(ItemTag::class);
    }
    public function gallery()
    {
        return $this->hasMany(ItemGallery::class);
    }

}
