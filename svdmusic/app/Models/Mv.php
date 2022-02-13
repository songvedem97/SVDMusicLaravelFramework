<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mv extends Model
{
    use HasFactory;
    protected $table='mv';
    protected $fillable =['name_mv','name_artist','image_mv','song_id','artist_id','link_mv','status','prioty','created_at','updated_id'];
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name_mv','like','%'.$key.'%');
        }
        return $query;
    }
    public function songs()
    {
        return $this->hasMany(song::class,'mv_id','id');
    }
}
