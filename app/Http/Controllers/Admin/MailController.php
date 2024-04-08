<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function edit()
    {
        $mail=Mail::first();
        $about=About::first();
        return view('admin.mail.update',compact('mail','about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'mail_transport' => 'required',
            'mail_port' => 'required',
            'mail_password' => 'required',
            'mail_from' => 'required',
            'mail_host' => 'required',
            'mail_username' => 'required',
            'mail_encryption' => 'required',
        ]);

        $mail=Mail::find($request->id);
        Mail::where('id',$request->id)->update([
            'mail_transport' =>$request->mail_transport,
            'mail_port' =>$request->mail_port,
            'mail_password' =>$request->mail_password,
            'mail_from' =>$request->mail_from,
            'mail_host' =>$request->mail_host,
            'mail_username' =>$request->mail_username,
            'mail_encryption' =>$request->mail_encryption,
        ]);
        $notification=array('messege'=>'Successfully updated!! ','alert-type'=>'success');
        return redirect()->route('mail.edit')->with($notification);

    }


}
