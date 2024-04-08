<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\Models\Comment;
 use App\Models\Reply;
use Illuminate\Support\Facades\Auth;
class CommentsController extends Controller
{
    public function store(Request $request)
    {
                  if(Auth::check()){

                     $data=[
                        "user_id"=>$request->user_id,
                        "blog_id"=>$request->blog_id,
                        "comment"=>$request->comment,
                       ];
                
                       Comment::create($data);
                       return response()->json([
                        "status"=>200
                       ]);

                  }else{
                     $notification=array('messege'=>'You are not login! ','alert-type'=>'success');
                     return redirect()->route('login')->with($notification);
                  }
       
    }
    public function replystore(Request $request)
    {
       $data=[
        "user_id"=>$request->user_id,
        "comment_id"=>$request->comment_id,
        "reply"=>$request->replymessage,
       ];
       Reply::create($data);
       return response()->json([
        "status"=>200,
       ]);
    }

      // public function replyshow()
      //  {

      //   $replies= Comment::all();
      //    return view('frontend.blogpost',compact('replies'));

      //  }

}
