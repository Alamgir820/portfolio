<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            
            
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required|max:400',
            
            
        ]);
        $data=[
            "name"=>$request->name,
            "email"=>$request->email,
            "subject"=>$request->subject,
            "message"=>$request->message,
        ];
        Contact::create($data);
        return response()->json([
            "status"=>200
        ]);
    }

    public function storepage(Request $request)
    {
        $request->validate([
            
            
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required|max:400',
            
            
        ]);

        $data=[
            "name"=>$request->name,
            "email"=>$request->email,
            "subject"=>$request->subject,
            "message"=>$request->message,
        ];
        Contact::create($data);
        return response()->json([
            "status"=>200
        ]);
    }




}
