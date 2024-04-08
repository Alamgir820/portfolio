<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use App\Models\Homepage;
use App\Models\User;
use File;
use Image;
class HomepageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(){
        $data=Homepage::first();
        $about=About::first();
        return view('admin.home',compact('data','about'));
    }
    //homepage update method
    public function update(Request $request)
    {


        $data=Homepage::find($request->id);
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            
            
        ]);
       
		if($request->hasFile('bc_image')){
			$file=$request->file('bc_image');
			$imageName=uniqid().'.'.$file->getClientOriginalExtension();
			$imagepath=public_path('images/');
            $imagesize=Image::make($file)->resize(960,600);
            $imagesize->save($imagepath.$imageName);
			if($data->bc_image){
				File::delete('public/images/'.$data->bc_image);	
			}
		}else{
			$imageName=$data->bc_image;
		}

        
		if($request->hasFile('logo')){
			$logo=$request->file('logo');
			$logoName=uniqid().'.'.$logo->getClientOriginalExtension();
			$logopath=public_path('images/');
            $logosize=Image::make($logo)->resize(150,150);
            $logosize->save($logopath.$logoName);
			if($data->logo){
				File::delete('public/images/'.$data->logo);	
			}
		}else{
			$logoName=$data->logo;
		}
        $home=Homepage::where('id',$request->id)->update([
            // 'id'=>$request->id,
            'title'=>$request->title,
            'sub_title'=>$request->sub_title,
            'bc_image'=>$imageName,
            'logo'=>$logoName,
        ]);
        $notification=array('messege'=>'Successfully updated!! ','alert-type'=>'success');
        return redirect()->back()->with($notification);
            
         

    }


    public function user()
    {
        $user=User::latest()->paginate(8);
        $about=About::first();
        return view('admin.user.user',compact('user','about'));
    }
}
