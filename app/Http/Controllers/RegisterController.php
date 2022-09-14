<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function save(Request $request)
    {
        if(Auth::check()){
            return redirect(route('posts'));
        }

        $validateFields = $request->validate([
            'name' => 'required|max:15',
            'password' => 'required'
        ]);

        $user = User::create($validateFields);
        if($user){
            Auth::login($user);
            return redirect(route('posts'));
        }

        return redirect(route('reg_page'))->withErrors([
            'formError' => 'oshibka'
        ]);
    }
}
