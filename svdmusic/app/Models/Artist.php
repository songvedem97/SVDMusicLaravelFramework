<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    protected $table = 'artist';
    protected $fillable = ['name_artist','birth_day_artist','slug_artist','image_artist','area_id','description_artist','status','prioty'];
    /*-- 1-n --*/
    public function songs()
    {
        return $this->hasMany(song::class,'artist_id','id');
    }
    public function area()
    {
        return $this->hasOne(area::class,'id','area_id');
    }
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name_artist','like','%'.$key.'%');
        }
        return $query;
    }
}
