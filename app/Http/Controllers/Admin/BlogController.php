<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Homepage;
use File;
use Image;
class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blog=Blog::all();
        $about=About::first();
        return view('admin.blog.index' , compact('blog','about'));
    }
    public function create()
    {
        $about=About::first();
        return view('admin.blog.create',compact('about'));

    }
    public function store(Request $request)
    {

        $request->validate([
            
            
            'blog_title' => 'required',
            'blog_subtitle' => 'required',
            'blog_description' => 'required',
            'blog_image' => 'required|image',
            
        ]);
        
        if($request->file('blog_image')){
            $blogimage=$request->file('blog_image');
            $imagename=uniqid().'.'.$blogimage->getClientOriginalExtension();
            $path=public_path('blog/images/');
            $thumbnail=Image::make($blogimage)->resize(960,600);
            $thumbnail->save($path.$imagename);
        }
        $data=[
            "blog_title"=>$request->blog_title,
            "blog_subtitle"=>$request->blog_subtitle,
            "blog_description"=>$request->blog_description,
            "blog_image"=>$imagename,
        ];
         
        Blog::create($data);
        $notification=array('messege'=>'Successfully inserted!! ','alert-type'=>'success');
        return redirect()->route('blog.index')->with($notification);
       
    }
    public function edit($id){
        $data=Blog::find($id);
        $about=About::first();
        return view('admin.blog.edit',compact('data','about'));
    }


    public function update(Request $request)
    {
        $request->validate([
            
            
            'blog_title' => 'required',
            'blog_subtitle' => 'required',
            'blog_description' => 'required',
            
            
        ]);

        $data=Blog::find($request->id);
       
		if($request->hasFile('blog_image')){
			$file=$request->file('blog_image');
			$imageName=uniqid().'.'.$file->getClientOriginalExtension();
            $path=public_path('blog/images/');
            $thumbnail=Image::make($file)->resize(960,600);
            $thumbnail->save($path.$imageName);
			if($data->blog_image){
				File::delete('public/blog/images/'.$data->blog_image);	
			}
		}else{
			$imageName=$data->blog_image;
		}
        
        $data=[
            "blog_title"=>$request->blog_title,
            "blog_subtitle"=>$request->blog_subtitle,
            "blog_description"=>$request->blog_description,
            "blog_image"=>$imageName,
        ];
         
        Blog::where('id',$request->id)->update($data);
        $notification=array('messege'=>'Successfully updated!! ','alert-type'=>'success');
        return redirect()->route('blog.index')->with($notification);
    }
    public function delete($id){
        $data=Blog::find($id);
        Blog::where('id',$data->id)->delete();
        File::delete('public/blog/images/'.$data->blog_image);

        $notification=array('messege'=>'Successfully deleted!! ','alert-type'=>'success');
        return redirect()->route('blog.index')->with($notification);
    }


	// 	if($request->hasFile('logo')){
	// 		$logo=$request->file('logo');
	// 		$logoName=uniqid().'.'.$logo->getClientOriginalExtension();
	// 		$logo->move('public/images',$logoName);
	// 		if($data->logo){
	// 			File::delete('public/images/'.$data->logo);	
	// 		}
	// 	}else{
	// 		$logoName=$request->logo;
	// 	}
    //     $home=Homepage::where('id',$request->id)->update([
    //         // 'id'=>$request->id,
    //         'title'=>$request->title,
    //         'sub_title'=>$request->sub_title,
    //         'bc_image'=>$imageName,
    //         'logo'=>$logoName,
    //     ]);
    //     $notification=array('messege'=>'Successfully updated!! ','alert-type'=>'success');
    //     return redirect()->back()->with($notification);
            
         

    // }
}
