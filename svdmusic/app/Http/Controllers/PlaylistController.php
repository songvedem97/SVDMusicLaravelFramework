<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Playlist::orderBy('created_at','DESC')->search()->paginate(10);
        return view('admin.playlist.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $playlist = Playlist::orderBy('created_at','DESC')->get();
        return view('admin.playlist.create',compact('playlist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('upload_image')){
            $file = $request ->upload_image;
            $ext = $request ->upload_image->extension();
            $file_name = time().'_'.'playlist_song.'.$ext;
            $file->move(public_path('uploads/playlist'),$file_name);
        }
        $request->merge(['image_playlist'=>$file_name]);
        if(Playlist::create($request->all())){
            return redirect()->route('playlist.index')->with('success','Thêm mới playlist thành công!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function show(Playlist $playlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Playlist $playlist)
    {
        return view('admin.playlist.edit',compact('playlist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Playlist $playlist)
    {
        if($request->hasFile('upload_image'))
        {
            $destination = public_path('uploads/category/').$playlist->image_playlist;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->upload_image;
            $ext = $request->upload_image->extension();
            $file_name = time().'_'.'play$playlist_song.'.$ext;
            $file->move(public_path('uploads/playlist'),$file_name);
            $request->merge(['image_play$playlist'=>$file_name]);
        }
        $playlist->update($request->only('name_playlist','image_playlist','description_playlist','prioty','status'));
        return redirect()->route('playlist.index')->with('success','Cập nhật playlist thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Playlist $playlist)
    {
        if($playlist->songs->count()>0){
            return redirect()->route('playlist.index')->with('error','Playlist chứa bài hát, không thể xóa!');
        }
        else{
            $destination = public_path('uploads/playlist/').$playlist->image_playlist;
            if(File::exists($destination)){
                File::delete($destination);
             }
            $playlist->delete();
            return redirect()->route('category.index')->with('success','Xóa playlist thành công!');
        }
    }
}
