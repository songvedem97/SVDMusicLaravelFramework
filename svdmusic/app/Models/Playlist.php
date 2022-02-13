<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;
    protected $table = 'playlist';
    protected $fillable = ['name_playlist','image_playlist','status','prioty','song_id','artist_id','account_id','description_playlist'];
    public function artist()
    {
        return $this->hasOne(artist::class,'id','artist_id');
    }
    public function song()
    {
        return $this->hasOne(song::class,'id','song_id');
    }
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name_song','like','%'.$key.'%');
        }
        return $query;
    }
}
