<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $table = 'area';
    protected $fillable = ['name_area','image_area','slug_area','prioty','status'];
    public function songs()
    {
        return $this->hasMany(song::class,'area_id','id')->where('status',1);
    }
    public function artist()
    {
        return $this->hasOne(artist::class,'id','artist_id');
    }
}
