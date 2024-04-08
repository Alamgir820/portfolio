<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Work;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Homepage;
use App\Models\Blog;

class LogoutController extends Controller
{


public function logout()
{
    Auth::logout();
    
   $notification=array('messege'=>'You are logged out! ','alert-type'=>'success');
   return redirect()->route('frontend.index')->with($notification);

    // $works=Work::all();
    // $services=Service::all();
    // $skill=Skill::all();
    // $about=About::first();
    // $logo=Homepage::first();
    // $blog=Blog::all();
   
   // return view('frontend.frontendindex',compact('works','services','skill','about','logo','blog'));


}



}
