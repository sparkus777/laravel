<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
class MainController extends Controller
{
    public function posts() {
        $blog = new Posts();
return view('posts', ['blog' => $blog->all()]);
    }

    public function create() {
        return view('post_create');

    }
    public function post_create(Request $request) {
        $message = new Posts();
        $message->title= $request->input('title');
        $message->content= $request->input('content');
        $message->created_at= $request->input("");

        $message->save();
        return redirect()->route('posts');
    }
}
