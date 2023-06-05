<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StaticPage;
use Exception;

class UnauthrorizedController extends \App\Http\Controllers\Controller
{
    public function  register_do(Request $request){
       $validated = $request->validate([
        'name'=> 'required', 
        'surname'=> 'required',
        'nick'=> 'required|unique:users,nick',
        'email'=> 'required|unique:users,email',
        'number'=> 'required|unique:users,number',
        'city'=> 'required',
        'pass'=> 'required',
        'rass'=> 'required'
    ]);
    
    $validated ['rass'] = $request->has('rass') ? 1 : 0;
    $validated ['password'] = $validated['pass'];

    \App\Models\User::create($validated);

    if(!Auth::guard()->attempt($validated))
        return view('auth.message', ['message'=>'register_done_but_auth_error']);

    return view('auth.message', ['message'=>'register_done']);
}

    public function login_do(Request $request){
        $validated = $request->validate([
            'nick'=> 'required',
            'password'=> 'required',
            
        ]);
        
        if(!Auth::guard()->attempt($validated))
            return view('auth.message', ['message'=>'auth_error']);
    
        return view('auth.profile');
    }
}