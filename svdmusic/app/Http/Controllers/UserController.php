<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::orderBy('created','ASC')->paginate(10);
        return view('admin.user.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            $file_name = time().'_'.'user.'.$ext;
            $file->move(public_path('uploads/user'),$file_name);
            $request->merge(['image_user'=>$file_name]);
        }
        $password = bcrypt($request->password);
        $request->merge(['password'=>$password]);
        if(User::create($request->all())){
            return redirect()->route('user.index')->with('success','Thêm mới user thành công!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, user $user)
    {
        if($request->hasFile('upload_image'))
        {
            $destination = public_path('uploads/user/').$user->image_user;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->upload_image;
            $ext = $request->upload_image->extension();
            $file_name = time().'_'.'user.'.$ext;
            $file->move(public_path('uploads/user'),$file_name);
            $request->merge(['image_user'=>$file_name]);
        }
        $password = bcrypt($request->password);
        $request->merge(['password'=>$password]);
        $user->update($request->only('name','image_user','email','password','status','created_at','updated_at'));
        return redirect()->route('user.index')->with('success','Cập nhật user thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $destination = public_path('uploads/user/').$user->image_user;
            if(File::exists($destination)){
                File::delete($destination);
            }
        $user->delete();
        return redirect()->route('user.index')->with('success','Xóa user thành công!');
    }
}
