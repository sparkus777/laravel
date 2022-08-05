<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){

        if(Auth::check()){
            return redirect(route('posts'));
        }

        $formFields = $request->only(['name','password']);
        if(Auth::attempt($formFields)){
            return redirect()->intended(route('posts'));
        }
        return redirect(route('auth_page'))->withErrors([
            'name' => 'oshibka']);
    }
}
