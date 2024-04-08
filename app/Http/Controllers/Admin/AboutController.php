<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use File;
use Image;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        $about=About::first();
        return view('admin.about',compact('about'));
    }
    public function update(Request $request)
    {

        
        $data=About::find($request->id);
        $request->validate([
            'profile_name' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'image' => 'required',
            
            
        ]);
       


       
        if($request->hasFile('image')){
            $image=$request->file('image');
            $imageName=uniqid().'.'.$image->getClientOriginalExtension();
            $path=public_path('images/');
            $img=Image::make($image)->resize(150,150);
            $img->save($path.$imageName);
            if($data->image){
                File::delete('public/images/'.$data->image);
            }
        }else{
            $imageName=$data->image;
        }

     
            $about=[
                "profile_name"=>$request->profile_name,
                "name"=>$request->name,
                "email"=>$request->email,
                "phone"=>$request->phone,
                "image"=>$imageName,
            ];
           About::where('id',$request->id)->update($about);
           $notification=array('messege'=>'Successfully updated!! ','alert-type'=>'success');
           return redirect()->back()->with($notification);


    }
}
