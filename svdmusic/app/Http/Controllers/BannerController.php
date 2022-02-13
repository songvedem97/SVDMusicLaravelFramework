<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Banner::orderBy('created_at','DESC')->search()->paginate(10);
        return view('admin.banner.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
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
            $file_name = time().'_'.'banner_song.'.$ext;
            $file->move(public_path('uploads/banner'),$file_name);
        }
        $request->merge(['image_banner'=>$file_name]);
        if(Banner::create($request->all())){
            return redirect()->route('banner.index')->with('success','Thêm mới banner thành công!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(banner $banner)
    {
        return view('admin.banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, banner $banner)
    {
        if($request->hasFile('upload_image'))
        {
            $destination = public_path('uploads/banner/').$banner->image_banner;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->upload_image;
            $ext = $request->upload_image->extension();
            $file_name = time().'_'.'banner_song.'.$ext;
            $file->move(public_path('uploads/banner'),$file_name);
            $request->merge(['image_banner'=>$file_name]);
        }
        $banner->update($request->only('name_banner','image_banner','prioty','status'));
        return redirect()->route('banner.index')->with('success','Cập nhật banner thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(banner $banner)
    {
        $destination = public_path('uploads/banner/').$banner->image_banner;
        if(File::exists($destination)){
            File::delete($destination);
            }
        $banner->delete();
        return redirect()->route('banner.index')->with('success','Xóa banner thành công!');
        
    }
}
