<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable =  ['name', 'slug', 'status'];

    public function item()
    {
        return $this->hasMany(Items_with_category::class);
    }
}
