<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //admin after login
    public function admin()
    {

        $about=About::first();
        return view('admin.dashboard',compact('about'));
    }

    //admin custom logout
    public function logout()
    {
        Auth::logout();
        $notification=array('messege'=>'You are logged out! ','alert-type'=>'success');
        return redirect()->route('admin.login')->with($notification);
    }
}
