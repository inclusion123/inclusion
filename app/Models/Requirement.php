<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'experience','slug', 'position'];

    public static function requirement()
    {
       return Requirement::all();
    }

    public function skill()
    {
        return $this->hasMany(Skill::class);
    }
}
