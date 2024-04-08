<?php

namespace App\Providers;

use App\Models\Mail;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Config;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();


        $mail=Mail::first();
        if($mail){
            
            $data=[
            'driver'=>$mail->mail_transport,
            'host'=>$mail->mail_host,
            'port'=>$mail->mail_port,
            'encryption'=>$mail->mail_encryption,
            'username'=>$mail->mail_username,
            'password'=>$mail->mail_password,
            'from'=>[
                'address'=>$mail->mail_from,
                'name'=>'AH',
            ]
            
            ];
            Config::set('mail',$data);
        }

           

    }
}
