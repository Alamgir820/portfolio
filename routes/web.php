<?php

use App\Http\Controllers\Frontend\CommentsController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\LogoutController;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    
]);






 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/frontend/index');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
//Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'frontend'],function(){
   
    Route::get('/index',[FrontendController::class,'index'])->name('frontend.index');
     Route::get('/logout',[LogoutController::class,'logout'])->name('logout.index');
    Route::get('about',[FrontendController::class,'about'])->name('about.show');
    Route::get('services',[FrontendController::class,'services'])->name('frontend.services.show');
    Route::get('works',[FrontendController::class,'works'])->name('frontend.works.show');
    Route::get('blogs',[FrontendController::class,'blogs'])->name('frontend.blogs.show');
    Route::get('contact',[FrontendController::class,'contact'])->name('frontend.contact.show');
    Route::get('blog/{id}/post',[FrontendController::class,'blogpost'])->name('blogpost.show');
    Route::post('contact/store',[ContactController::class,'store'])->name('contact.store');
    Route::post('contact/storepage',[ContactController::class,'storepage'])->name('contact.storepage');
    Route::post('comment/store',[CommentsController::class,'store'])->name('comment.store');
    Route::get('comment/show',[CommentsController::class,'show'])->name('comment.show');
    Route::post('reply/store',[CommentsController::class,'replystore'])->name('reply.store');
    Route::get('reply/show',[CommentsController::class,'replyshow'])->name('reply.show');
   
});