<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $table = 'song';
    protected $fillable = ['name_song','image_song','image_bannersong','link_lyrics','link_mp3','status','prioty','area_id','category_id','artist_id','view'];
    // JOIN 1-1
    public function cate()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function artist()
    {
        return $this->hasOne(artist::class,'id','artist_id');
    }
    public function area()
    {
        return $this->hasOne(area::class,'id','area_id');
    }
    
    // local scope
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name_song','like','%'.$key.'%');
        }
        return $query;
    }
}
