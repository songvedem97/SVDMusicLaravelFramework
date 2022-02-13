<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Top100 extends Model
{
    use HasFactory;
    protected $fillable = ['name_top100','image_top100','prioty','status','created_at','updated_at'];
    protected $table = 'top100';

    public function songs()
    {
        return $this->hasMany(song::class,'top100_id','id');
    }
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name_top100','like','%'.$key.'%');
        }
        return $query;
    }
}
