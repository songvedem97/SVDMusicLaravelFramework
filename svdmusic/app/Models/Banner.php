<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = ['name_banner','image_banner','prioty','status'];
    protected $table = 'banner';
    //JOIN 1 - n
    public function songs()
    {
        return $this->hasMany(song::class,'banner_id','id');
    }

    // local scope
    // global scope

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name_banner','like','%'.$key.'%');
        }
        return $query;
    }
}
