<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Category;
use App\Models\Artist;
use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Requests\Song\StoreRequest;
use App\Http\Requests\Song\UpdateRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Song::orderBy('created_at','DESC')->search()->paginate(10);
        return view('admin.song.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::orderBy('name_category','ASC')->select('id','name_category')->get();
        $artists = Artist::orderBy('name_artist','ASC')->select('id','name_artist')->get();
        $areas = Area::orderBy('name_area','ASC')->select('id','name_area')->get();
        return view('admin.song.create',compact('cats','artists','areas'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

        if($request->hasFile('upload_image')){
            $file = $request->upload_image;
            $extension = $request->upload_image->extension();
            $file_name = $request->name_song.'.'.$extension;
            $file->move(public_path('uploads/image_song'),$file_name);
            $request->merge(['image_song'=>$file_name]);
        }
        if($request->hasFile('upload_imagebanner')){
            $file = $request->upload_imagebanner;
            $extension = $request->upload_imagebanner->extension();
            $file_name_imagebanner = $request->name_song.'_banner'.'.'.$extension;
            $file->move(public_path('uploads/banner_song'),$file_name_imagebanner);
            $request->merge(['image_bannersong'=>$file_name_imagebanner]);
        }
        if($request->hasFile('upload_mp3')){
            $file = $request->upload_mp3;
            $extension = $request->upload_mp3->extension();
            $file_name_mp3 = $request->name_song.'.'.$extension;
            $file->move(public_path('uploads/mp3'),$file_name_mp3);
            $request->merge(['link_mp3'=>$file_name_mp3]);
        }
        if($request->hasFile('upload_lrc')){
            $file = $request->upload_lrc;
            $extension=$file->getClientOriginalExtension();
            if($extension == 'lrc'){ 
                $file_name_lrc = $request->name_song.'.'.$extension;
                $file->move(public_path('uploads/lrc'),$file_name_lrc);
                $request->merge(['link_lyrics'=>$file_name_lrc]);
            }
        }
        if(Song::create($request->all())){
            return redirect()->route('song.index')->with('success','Thêm mới bài hát thành công!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(song $song)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(song $song)
    {
        $cats = Category::orderBy('name_category','ASC')->select('id','name_category')->get();
        $artists = Artist::orderBy('name_artist','ASC')->select('id','name_artist')->get();
        $areas = Area::orderBy('name_area','ASC')->select('id','name_area')->get();
        return view('admin.song.edit',compact('song','cats','artists','areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, song $song)
    {
        if($request->hasFile('upload_image'))
        {
            $destination = public_path('uploads/image_song/').$song->image_song;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->upload_image;
            
            $extension = $request->upload_image->extension();
            $file_name = $request->name_song.'.'.$extension;
            $file->move(public_path('uploads/image_song'),$file_name);
            $request->merge(['image_song'=>$file_name]);
        }
        if($request->hasFile('upload_imagebanner')){
            $destination = public_path('uploads/banner_song/').$song->image_bannersong;
            if(File::exists($destination)){
            File::delete($destination);
            }
            $file = $request->upload_imagebanner;
            $extension = $request->upload_imagebanner->extension();
            $file_name_imagebanner = $request->name_song.'_banner'.'.'.$extension;
            $file->move(public_path('uploads/banner_song'),$file_name_imagebanner);
            $request->merge(['image_bannersong'=>$file_name_imagebanner]);
        }

        if($request->hasFile('upload_mp3')){
            $destination = public_path('uploads/mp3/').$song->link_mp3;
            if(File::exists($destination)){
            File::delete($destination);
            }
            $file = $request->upload_mp3;
            $extension = $request->upload_mp3->extension();
            $file_name_mp3 = $request->name_song.'.'.$extension;
            $file->move(public_path('uploads/mp3'),$file_name_mp3);
            $request->merge(['link_mp3'=>$file_name_mp3]);
        }

        if($request->hasFile('upload_lrc')){
            $destination = public_path('uploads/lrc/').$song->link_lyrics;
            if(File::exists($destination)){
            File::delete($destination);
            }
            $file = $request->upload_lrc;
            $extension=$file->getClientOriginalExtension();
            if($extension == 'lrc'){ 
                $file_name_lrc = $request->name_song.'.'.$extension;
                $file->move(public_path('uploads/lrc'),$file_name_lrc);
                $request->merge(['link_lyrics'=>$file_name_lrc]);
            }
        }
        $song->update($request->only('name_song','category_id','image_song','image_bannersong','link_mp3','link_lyrics','artist_id','area_id','prioty','status'));
        return redirect()->route('song.index')->with('success','Cập nhật bài hát thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(song $song)
    {

        $des_image = public_path('uploads/image_song/').$song->image_song;
        $des_banner = public_path('uploads/banner_song/').$song->image_bannersong;
        $des_mp3 = public_path('uploads/mp3/').$song->link_mp3;
        $des_lrc = public_path('uploads/lrc/').$song->link_lyrics;

        if(File::exists($des_image)){
            File::delete($des_image);
        }
        if(File::exists($des_banner)){
            File::delete($des_banner);
        }
        if(File::exists($des_mp3)){
            File::delete($des_mp3);
        }
        if(File::exists($des_lrc)){
            File::delete($des_lrc);
        }
        $song->delete();
        return redirect()->route('song.index')->with('success','Xóa bài hát thành công!');
    }
}
