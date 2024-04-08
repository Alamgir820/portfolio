<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use App\Models\Skill;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Str;
class SkillController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()

    {
        $data=Skill::all();
            $about=About::first();
        return view('admin.skill.index',compact('data','about'));
    }
    public function create()
    {
        
        $about=About::first();



        return view('admin.skill.create',compact('about'));
    }
    public function store(Request $request)

    {
        $request->validate([
            'skill_name' => 'required',
            'skill_percentage' => 'required',
            'message' => 'required',
        ]);
        Skill::create($request->all());
        $notification=array('messege'=>'Successfully inserted!! ','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $data=Skill::find($id);
        $about=About::first();
        return view('admin.skill.edit',compact('data','about'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            
            'skill_name' => 'required',
            'skill_percentage' => 'required',
            'message' => 'required',
        ]);
       Skill::where('id',$id)->update([
        "skill_name"=>$request->skill_name,
        "skill_percentage"=>$request->skill_percentage,
        "message"=>$request->message,
       ]);

       $notification=array('messege'=>'Successfully inserted!! ','alert-type'=>'success');
       return redirect()->route('skill.index')->with($notification);
        
    }
    public function delete($id){
        $data=Skill::find($id);
        $data->delete();
        $notification=array('messege'=>'Successfully deleted!! ','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    

}
