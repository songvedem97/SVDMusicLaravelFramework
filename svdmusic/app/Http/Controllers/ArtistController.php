<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Requests\Artist\StoreRequest;
use App\Http\Requests\Artist\UpdateRequest;
use Illuminate\Support\Facades\File;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Artist::orderBy('created_at','DESC')->search()->paginate(8);
        return view('admin.artist.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::orderBy('name_area','ASC')->select('id','name_area')->get();
        return view('admin.artist.create',compact('areas'));
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
            $file = $request ->upload_image;
            $ext = $request ->upload_image->extension();
            $file_name = time().'_'.'artist.'.$ext;
            $file->move(public_path('uploads/artist'),$file_name);
            $request->merge(['image_artist'=>$file_name]);
        }
        
        if(Artist::create($request->all())){
            return redirect()->route('artist.index')->with('success','Thêm mới nghệ sĩ thành công!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(artist $artist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(artist $artist)
    {
        $areas = Area::orderBy('name_area','ASC')->select('id','name_area')->get();
        return view('admin.artist.edit',compact('artist','areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, artist $artist)
    {
        if($request->hasFile('upload_image'))
        {
            $destination = public_path('uploads/artist/').$artist->image_artist;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->upload_image;
            $ext = $request->upload_image->extension();
            $file_name = time().'_'.'artist.'.$ext;
            $file->move(public_path('uploads/artist'),$file_name);
            $request->merge(['image_artist'=>$file_name]);
        }

        $artist->update($request->only('name_artist','image_artist','slug_artist','birth_day_artist','description_artist','prioty','status'));
        return redirect()->route('artist.index')->with('success','Cập nhật nghệ sĩ thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(artist $artist)
    {
        if($artist->songs->count()>0){
            return redirect()->route('artist.index')->with('error','Nghệ sĩ có bài hát, không thể xóa!');
        }
        else{
            $destination = public_path('uploads/artist/').$artist->image_artist;
            if(File::exists($destination)){
                File::delete($destination);
             }
            $artist->delete();
            return redirect()->route('artist.index')->with('success','Xóa nghệ sĩ thành công!');
        }
    }
}
