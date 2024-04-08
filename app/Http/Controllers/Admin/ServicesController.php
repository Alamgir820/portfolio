<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
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
        $services=Service::latest()->paginate(5);
        $about=About::first();
        return view('admin.services.index',compact('services','about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $about=About::first();
        return view('admin.services.create',compact('about'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'description' => 'required|max:600',
        ]);
        Service::create($request->all());
        $notification=array('messege'=>'Successfully inserted!! ','alert-type'=>'success');
        return redirect()->route('services.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Service::find($id);
        $about=About::first();
       return view('admin.services.edit',compact('data','about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'description' => 'required|max:600',
        ]);
       
        $data=[
                "icon"=>$request->icon,
                "title"=>$request->title,
                "description"=>$request->description,
              ];
              Service::where('id',$id)->update($data);

        
        $notification=array('messege'=>'Successfully updated!! ','alert-type'=>'success');
        return redirect()->route('services.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $data=Service::find($id);
        Service::where('id',$id)->delete($data);
        
        $notification=array('messege'=>'Successfully deleted!! ','alert-type'=>'success');
        return redirect()->route('services.index')->with($notification);
    }
}
