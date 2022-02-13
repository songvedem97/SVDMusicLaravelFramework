<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Requests\Area\StoreRequest;
use Illuminate\Support\Facades\File;
class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Area::orderBy('created_at','DESC')->paginate(10);
        return view('admin.area.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.area.create');
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
            $file_name = time().'_'.'area.'.$ext;
            $file->move(public_path('uploads/area'),$file_name);
        }
        $request->merge(['image_area'=>$file_name]);
        if(Area::create($request->all())){
            return redirect()->route('area.index')->with('success','Thêm mới khu vực thành công!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(area $area)
    {
        return view('admin.area.edit',compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, area $area)
    {
        if($request->hasFile('upload_image'))
        {
            $destination = public_path('uploads/area/').$area->image_area;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->upload_image;
            $ext = $request->upload_image->extension();
            $file_name = time().'_'.'area.'.$ext;
            $file->move(public_path('uploads/area'),$file_name);
            $request->merge(['image_area'=>$file_name]);
        }
        $area->update($request->only('name_area','image_area','slug_area','prioty','status'));
        return redirect()->route('area.index')->with('success','Cập nhật khu vực thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(area $area)
    {
        if($area->songs->count()>0){
            return redirect()->route('area.index')->with('error','Khu vực chứa bài hát, không thể xóa!');
        }
        else{
            $destination = public_path('uploads/area').$area->image_area;
            if(File::exists($destination)){
                File::delete($destination);
             }
            $area->delete();
            return redirect()->route('area.index')->with('success','Xóa khu vực thành công!');
        }
    }
}
