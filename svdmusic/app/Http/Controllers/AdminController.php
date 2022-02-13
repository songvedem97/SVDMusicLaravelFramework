<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function login()
    {
        return view('admin.login');
    }
    public function post_login(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required' => 'Email không được để trống',
            'password.required' => 'Password không được để trống'
        ]
        );
        //thực hiện login
      
        if (Auth::attempt([
            'email' => $request -> input('email'),
            'password' => $request -> input('password')
        ],$request->input('remember'))) {
            return redirect()->route('dashboard');
        } else {
            Session::flash('error','Email hoặc password không chính xác!');
            return redirect()->back();
        }
       
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
