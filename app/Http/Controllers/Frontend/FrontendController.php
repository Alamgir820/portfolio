<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\Homepage;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Work;
use App\Models\Comment;
use App\Models\Footer;
use App\Models\Reply;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

   

    public function index()
    {
       
       $footer=Footer::all();
        $works=Work::all();
        $services=Service::all();
        $skill=Skill::all();
        $about=About::first();
        $logo=Homepage::first();
        $blog=Blog::all();
       
        return view('frontend.frontendindex',compact('logo','about','skill','services','works','blog','footer'));
    }
    public function about()
    {

        $footer=Footer::all();
        $logo=Homepage::first();
        $skill=Skill::all();
        $about=About::first();
    
        return view('frontend.about',compact('about','logo','skill','footer'));
    }

    public function blogpost($id)
    {   $footer=Footer::all();
        $comment=Comment::paginate(10);
        $blogpost=Blog::find($id);
        $works=Work::all();
        $services=Service::all();
        $skill=Skill::all();
        $about=About::first();
        $logo=Homepage::first();
        $blog=Blog::latest()->paginate(10);
        $replies=Reply::all();
       
       
        return view('frontend.blogpost',compact('blogpost','works','services','skill','about','logo','blog','comment','replies','footer'));
    }


    public function services()
    {

        $footer=Footer::all();
        $about=About::first();
        $logo=Homepage::first();
        $services=Service::all();
        return view('frontend.services',compact('logo','services','footer','about'));
    }

    public function works()
    {
        $logo=Homepage::first();
        $about=About::first();
        $footer=Footer::all();
        $works=Work::all();
        return view('frontend.works',compact('logo','works','footer','about'));
    }

    public function blogs()
    {
        $logo=Homepage::first();
        $about=About::first();
        $footer=Footer::all();
        $blog=Blog::all();
        return view('frontend.blogs',compact('logo','about','blog','footer'));
    }

    public function contact()
    {
        $about=About::first();
        $logo=Homepage::first();
        $footer=Footer::all();
       
        return view('frontend.contact',compact('logo','footer','about'));
    }

    

}
