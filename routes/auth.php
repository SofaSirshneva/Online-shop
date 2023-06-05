<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\Auth\UnauthrorizedController;
use App\Http\Controllers\Auth\AuthrorizedController;

Route::post('/login.do', [UnauthrorizedController::class, 'login_do']) -> name('auth.login.do');

Route::middleware('guest')->group(function(){
    Route::view('/register', 'auth.register')->name('auth.register');
    //Route::view('/register', 'register');
    Route::post('/register.do', [UnauthrorizedController::class, 'register_do'])->name('auth.register.do');
});

Route::middleware('auth', 'permission: profile.action')->group(function(){
    Route::view('/profile', 'auth.profile')->name('auth.profile');
    Route::post('/profile.update', [AuthrorizedController::class, 'profile_update'])->name('auth.profile.update');
    Route::get('/logout', [AuthrorizedController::class, 'logout'])->name('auth.logout');
});

//Route::get('/', function () {
   // return view('main');
//});
