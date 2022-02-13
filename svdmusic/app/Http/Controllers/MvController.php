<?php

namespace App\Http\Controllers;

use App\Http\Requests\Mv\UpdateRequest;
use App\Models\MV;
use App\Models\Artist;
use App\Models\Song;
use Illuminate\Http\Request;
use App\Http\Requests\Mv\StoreRequest;
use Illuminate\Support\Facades\File;

class MvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MV::orderBy('created_at','DESC')->search()->paginate(10);
        return view('admin.mv.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $songs = Song::orderBy('name_song','ASC')->select('id','name_song')->get();
        $artists = Artist::orderBy('name_artist','ASC')->select('id','name_artist')->get();
        return view('admin.mv.create',compact('songs','artists'));
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
            $file_name = time().'_'.'mv_song.'.$ext;
            $file->move(public_path('uploads/mv'),$file_name);
        }
        $request->merge(['image_mv'=>$file_name]);
        if(mv::create($request->all())){
            return redirect()->route('mv.index')->with('success','Thêm mới MV thành công!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mv  $mv
     * @return \Illuminate\Http\Response
     */
    public function show(mv $mv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mv  $mv
     * @return \Illuminate\Http\Response
     */
    public function edit(mv $mv)
    {
        $songs = Song::orderBy('name_song','ASC')->select('id','name_song')->get();
        $artists = Artist::orderBy('name_artist','ASC')->select('id','name_artist')->get();
        return view('admin.mv.edit',compact('mv','songs','artists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mv  $mv
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, mv $mv)
    {
        if($request->hasFile('upload_image'))
        {
            $destination = public_path('uploads/mv/').$mv->image_mv;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->upload_image;
            $ext = $request->upload_image->extension();
            $file_name = time().'_'.'mv_song.'.$ext;
            $file->move(public_path('uploads/mv'),$file_name);
            $request->merge(['image_mv'=>$file_name]);
        }
        $mv->update($request->only('name_mv','image_mv','name_artist','link_mv','song_id','artist_id','prioty','status'));
        return redirect()->route('mv.index')->with('success','Cập nhật MV thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mv  $mv
     * @return \Illuminate\Http\Response
     */
    public function destroy(mv $mv)
    {
        if($mv->songs->count()>0){
            return redirect()->route('mv.index')->with('error','MV chứa bài hát, không thể xóa!');
        }
        else{
            $destination = public_path('uploads/mv/').$mv->image_mv;
            if(File::exists($destination)){
                File::delete($destination);
             }
            $mv->delete();
            return redirect()->route('mv.index')->with('success','Xóa MV thành công!');
        }
    }
}
