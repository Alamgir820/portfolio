<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    public function index()
    {
        $footer=Footer::all();
        $about=About::first();
        return view('admin.footer.index',compact('footer','about'));
    }

    public function create()
    {
        $about=About::first();
        return view('admin.footer.create',compact('about'));
    }
    public function store(Request $request)
    {
        $request->validate([
            
            
            'websitename' => 'required',
            'websitelink' => 'required',
           
           
            
        ]);
       Footer::create($request->all());
       $notification=array('messege'=>'Successfully inserted!! ','alert-type'=>'success');
       return redirect()->route('footer.index')->with($notification);
      

    }
    public function edit($id)
    {
        $footerid=Footer::find($id);
        $about=About::first();
        return view('admin.footer.edit',compact('footerid','about'));
    }


    public function update(Request $request,$id)
    {

     
        $request->validate([
            
            
            'websitename' => 'required',
            'websitelink' => 'required',
           
           
            
        ]);
       Footer::where('id',$request->id)->update([
        "websitename"=>$request->websitename,
        "websitelink" =>$request->websitelink,
        "websiteicon" =>$request->websiteicon,
       ]);
       $notification=array('messege'=>'Successfully updated!! ','alert-type'=>'success');
       return redirect()->route('footer.index')->with($notification);
      

    }

    public function delete($id)
    {
        $data=Footer::find($id);
        Footer::where('id',$data->id)->delete();

        $notification=array('messege'=>'Successfully deleted!! ','alert-type'=>'success');
        return redirect()->route('footer.index')->with($notification);
       
    }

}
