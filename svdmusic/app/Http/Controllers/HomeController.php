<?php

namespace App\Http\Controllers;
use App\Models\Song;
use App\Models\Category;
use App\Models\Artist;
use App\Models\Area;
use App\Models\Mv;
use App\Models\Banner;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banner=Banner::where('status',1)->orderBy('created_at','DESC')->limit(3)->get();
        $mv =MV::where('status',1)->orderBy('created_at','DESC')->get();
        $songnew =Song::where('status',1)->orderBy('created_at','DESC')->limit(3)->get();
        $song = Song::where('status',1)->orderBy('name_song','ASC')->get();
        $category = Category::where('status',1)->orderBy('name_category','ASC')->get();
        $artist = Artist::where('status',1)->orderBy('name_artist','ASC')->get();
        $area = Area::where('status',1)->orderBy('id','ASC')->get();
        return view('home',compact('song','category','artist','area','songnew','mv','banner'));
    }
    public function view($id,$slug)
    {
        $songArea = Song::where('area_id',$id)->where('status',1)->limit(3)->get();
        $modelArtist = Artist::where('slug_artist',$slug)->first();
        $modelArea = Area::where('slug_area',$slug)->first();
        $artist = Artist::where('slug_artist',$slug)->first();
        if($modelArea){
            return view('area',['model'=>$modelArea,'songArea'=>$songArea]);
        }
        elseif($artist){
            return view('artistdetail',['artist'=>$artist,'model'=>$modelArtist]);
        }
    }
    public function error500 ()
    {
        return view('errors.500');
    }
    public function error404()
    {
        return view('errors.404');
    }
    public function user()
    {
        return view('user');
        
    }
    public function artist()
    {
        return view('artist');
    }
    public function bxh()
    {
        return view('bxh');
    }
    public function top100()
    {
        return view('top100');
    }
    public function category()
    {
        return view('category');
    }
    public function newsong()
    {
        return view('newsong');
        
    }
}
