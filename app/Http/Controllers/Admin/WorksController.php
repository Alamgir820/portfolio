<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Service;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use GdImage;
use Intervention\Image\Facades\Image;
class WorksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Work::all();
        $about=About::first();
       // return $data;
        return view('admin.works.index',compact('data','about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=Service::all();
        $about=About::first();
        return view('admin.works.create',compact('data','about'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            
            
            'client_name' => 'required',
            'review_star' => 'required',
            'project_image' => 'required|image',
            'client_image' => 'required|image',
            'client_review' => 'required',
        ]);
        
        
        $file1=$request->file('project_image');
        $imageName1=uniqid().'.'.$file1->getClientOriginalExtension();
        $project_image=Image::make($file1)->resize(960,600);
        $publicpath=public_path('works/images/');
        $project_image->save($publicpath.$imageName1);

        
        $file=$request->file('client_image');
        $imageName=uniqid().'.'.$file->getClientOriginalExtension();
        $image=Image::make($file)->resize(150,150);
        $publicpath1=public_path('works/images/');
            $image->save($publicpath1.$imageName);
        $data=[
            'service_id'=>$request->service_id,
            'client_name' =>$request->client_name ,
            'review_star' => $request->review_star,
            'project_image' =>$imageName1 ,
            'client_image' => $imageName,
            'client_review' => $request->client_review,
        ];
       
        Work::create($data);
        $notification=array('messege'=>'Successfully inserted!! ','alert-type'=>'success');
        return redirect()->route('works.index')->with($notification);
         
          

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Work::find($id);
        

        if(Work::where('id',$id)->delete($data)){ 
        File::delete('public/works/images/'.$data->project_image);
        File::delete('public/works/images/'.$data->client_image);
        }
        
       
        

        $notification=array('messege'=>'Successfully inserted!! ','alert-type'=>'success');
        return redirect()->route('works.index')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Service::all();
        $data1=Work::find($id);
        $about=About::first();
        return view('admin.works.edit',compact('data1','data','about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=Work::find($id);
        $request->validate([
            
            
            'client_name' => 'required',
            'review_star' => 'required',
            'client_review' => 'required',
        ]);
        
        if($file=$request->hasFile('project_image')){
            $file=$request->file('project_image');
            $filename=uniqid().'.'.$file->getClientOriginalExtension();
            $path=public_path('works/images/');
            $thumbnail=Image::make($file)->resize(960,600);
            $thumbnail->save($path.$filename);
            if($data->project_image){
              
               File::delete('public/works/images/'.$data->project_image);
            }
            
           
        }else{
            $filename=$data->project_image;
        }
      
        if($file1=$request->hasFile('client_image')){
            $file1=$request->file('client_image');
            $filename1=uniqid().'.'.$file1->getClientOriginalExtension();
            $path1=public_path('works/images/');
            $thumbnail1=Image::make($file1)->resize(150,150);
            $thumbnail1->save($path1.$filename1);
            if($data->client_image){
              
             File::delete('public/works/images/'.$data->client_image);
            }
            
           
        }else{
            $filename1=$data->client_image;
        }
   
        $data1=[
            'service_id'=>$request->service_id,
           'client_name' => $request->client_name,
           'review_star' => $request->review_star,
           'project_image' =>$filename ,
           'client_image' => $filename1,
           'client_review' =>$request->client_review,
        ];
       
        Work::where('id',$id)->update($data1);
        $notification=array('messege'=>'Successfully updated!! ','alert-type'=>'success');
        return redirect()->route('works.index')->with($notification);
         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


        
        // $data=Work::find($id);
        // Work::where('id',$id)->delete($data);
        
        // $notification=array('messege'=>'Successfully inserted!! ','alert-type'=>'success');
        // return redirect()->route('works.index')->with($notification);
    }
}
