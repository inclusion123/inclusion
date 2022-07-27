<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['name','address', 'email', 'mobile', 'toll_free', 'web','instagram', 'linkedin', 'youtube', 'twitter', 'facebook'];

}
