<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['name','page_name','title','icon','slug','description','status','detail_name','detail_description'];

    
    const INACTIVE = 0;
    const ACTIVE = 1;
 

    public static function all_items(){
        return [
            self::INACTIVE => 'InActive',
            self::ACTIVE => 'Active',
           
        ];
    }
    public static function get_items($status){
          $all_items = self::all_items();
          return $all_items[$status];
    }


    public function childService()
    {
        return $this->hasMany(ChildService::class);
    }
}
