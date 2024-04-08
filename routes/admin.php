<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomepageController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\WorksController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\MailController;
use Illuminate\Support\Facades\Route;


Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'adminlogin'])->name('admin.login');

//Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')
//->middleware('is_admin');
Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware'=>'is_admin'],function(){
    //admin login logout route
    Route::get('/admin/home', [AdminController::class, 'admin'])->name('admin.home');
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    
    Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'homepage'],function(){
        // home page route
        Route::get('/edit',[HomepageController::class,'edit'])->name('home.edit');
        Route::post('/update',[HomepageController::class,'update'])->name('home.update');
        Route::get('/user',[HomepageController::class,'user'])->name('user.show');
    });
    Route::group(['about'=>'about'],function(){
        //edit about page route
        Route::get('/edit',[AboutController::class,'edit'])->name('about.edit');
        Route::post('/update',[AboutController::class,'update'])->name('about.update');
    });
   Route::group(['prefix'=>'skill'],function(){
        // skill page route
        Route::get('/index',[SkillController::class,'index'])->name('skill.index');
        Route::get('/create',[SkillController::class,'create'])->name('skill.create');
        Route::post('/store',[SkillController::class,'store'])->name('skill.store');
        Route::get('/{id}/edit',[SkillController::class,'edit'])->name('skill.edit');
        Route::post('/{id}/update',[SkillController::class,'update'])->name('skill.update');
        Route::get('/{id}/delete',[SkillController::class,'delete'])->name('skill.delete');
   });
    Route::group(['prefix'=>'service'],function(){
        //services route
        Route::resource('services',ServicesController::class);
        Route::get('/{id}/delete',[ServicesController::class,'delete'])->name('services.delete');
    });
   
    Route::group(['prefix'=>'work'],function(){
        //works route
    Route::resource('works',WorksController::class);
    
    });
  

   });
    
    
  

});
Route::group(['prefix'=>'bolg'],function(){
    //blog route
     Route::get('/index',[BlogController::class,'index'])->name('blog.index');
     Route::get('/create',[BlogController::class,'create'])->name('blog.create');
     Route::post('/store',[BlogController::class,'store'])->name('blog.store');
     Route::get('/{id}/edit',[BlogController::class,'edit'])->name('blog.edit');
     Route::post('/{id}/update',[BlogController::class,'update'])->name('blog.update');
     Route::get('/{id}/delete',[BlogController::class,'delete'])->name('blog.delete');
    
        //footer route
    Route::group(['prefix'=>'footer'],function(){
    Route::get('/index',[FooterController::class,'index'])->name('footer.index');
    Route::get('/create',[FooterController::class,'create'])->name('footer.create');
    Route::post('/store',[FooterController::class,'store'])->name('footer.store');
    Route::get('/{id}/edit',[FooterController::class,'edit'])->name('footer.edit');
    Route::post('/{id}/update',[FooterController::class,'update'])->name('footer.update');
    Route::get('/{id}/delete',[FooterController::class,'delete'])->name('footer.delete');
     });
     //mail route
        Route::group(['prefix'=>'mail'],function(){
        Route::get('/smtp/edit',[MailController::class,'edit'])->name('mail.edit');
        Route::post('/smtp/update',[MailController::class,'update'])->name('mail.update');
     });


});