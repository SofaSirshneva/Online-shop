<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StaticPage;
use Exception;

class AuthrorizedController extends \App\Http\Controllers\Controller
{
    public function  profile_update(Request $request){
        $user = Auth::user();/*\App\Models\User::findOrFail(Auth::guard()->user()->id); */
        
       $validated = $request->validate([
        'pic'=>'file',
        'name'=> 'required', 
        'surname'=> 'required',
        'city'=> 'required',
        'passs'=> ['required', function($attribute, $value, $fail){
            global $request;
            if($request->get('passs') !== auth()->user()->password)
                $fail('Старый пароль неверный');
        }],
        'pass',
    ]);
    //throw new Exception(); 
    $pass=$request->get('pass');

    $pic = $request->hasFile('pic') ? $request->file('pic') : false;
    $pic_tmp_path = $pic ? $pic->getPathName() : '';
        $validated['pic'] = $pic ? 'pics/' . $request->login . '.jpg' : '';

        if ($pic) {
            @mkdir('pics');
            copy($pic_tmp_path, $validated['pic']);
           // throw new Exception();
            $user->pic = $validated['pic'] ? $validated['pic'] : 'pics/000.jpg';
        }

    if($pass == null)
        $validated ['password'] = $validated['passs'];
    else 
        $validated ['password'] = $pass;

    $user->name = $validated['name'];
    $user->surname = $validated['surname'];
    $user->city = $validated['city'];
    $user->password = $validated['password'];
    $user->save();

    return view('auth.message', ['message'=>'profile_updated']);
}

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}