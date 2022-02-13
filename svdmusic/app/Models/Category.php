<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name_category','image_category','prioty','status'];
    protected $table = 'category';
    //JOIN 1 - n
    public function songs()
    {
        return $this->hasMany(song::class,'category_id','id');
    }

    // local scope
    // global scope

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name_category','like','%'.$key.'%');
        }
        return $query;
    }
}
