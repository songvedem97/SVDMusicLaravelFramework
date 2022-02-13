<?php

namespace App\Http\Controllers;

use App\Models\Top100;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Top100\StoreRequest;
use App\Http\Requests\Top100\UpdateRequest;

class Top100Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Top100::orderBy('created_at','DESC')->search()->paginate(10);
        return view('admin.top100.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $top100 = Top100::orderBy('created_at','DESC')->get();
        return view('admin.top100.create',compact('top100'));
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
            $file_name = time().'_'.'top100_song.'.$ext;
            $file->move(public_path('uploads/top100'),$file_name);
        }
        $request->merge(['image_top100'=>$file_name]);
        if(Top100::create($request->all())){
            return redirect()->route('top100.index')->with('success','Thêm mới Top100 thành công!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\top100  $top100
     * @return \Illuminate\Http\Response
     */
    public function show(top100 $top100)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\top100  $top100
     * @return \Illuminate\Http\Response
     */
    public function edit(top100 $top100)
    {
        return view('admin.top100.edit',compact('top100'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\top100  $top100
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, top100 $top100)
    {
        if($request->hasFile('upload_image'))
        {
            $destination = public_path('uploads/top100/').$top100->image_top100;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->upload_image;
            $ext = $request->upload_image->extension();
            $file_name = time().'_'.'top100_song.'.$ext;
            $file->move(public_path('uploads/top100'),$file_name);
            $request->merge(['image_top100'=>$file_name]);
        }
        $top100->update($request->only('name_top100','image_top100','prioty','status'));
        return redirect()->route('top100.index')->with('success','Cập nhật Top100 thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\top100  $top100
     * @return \Illuminate\Http\Response
     */
    public function destroy(top100 $top100)
    {
        if($top100->songs->count()>0){
            return redirect()->route('top100.index')->with('error','Top100 chứa bài hát, không thể xóa!');
        }
        else{
            $destination = public_path('uploads/top100/').$top100->image_top100;
            if(File::exists($destination)){
                File::delete($destination);
             }
            $top100->delete();
            return redirect()->route('top100.index')->with('success','Xóa thành công!');
        }
    }
}
