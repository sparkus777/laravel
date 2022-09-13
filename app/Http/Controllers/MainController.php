<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function posts() {
        $posts = Post::all();
        return view('posts', ['posts' => $posts]);
    }

    public function main_page() {
        return view('main_page');

    }
    public function create() {
        return view('post_create');

    }
    public function store(Request $request) {
        $valid = $request->validate([
            'title' => 'required|min:4|max:100',
            'content' => 'min:4|max:100'

        ]);

        $message = new Post();
        $message->title= $request->input('title');
        $message->content= $request->input('content');
        $message->user_id= $request->user()->id;
        $message->save();
        return redirect()->route('posts')->with('success','Блог добавлен!');
    }
    public function edit($id) {
        $blog = new Post();
       return view('edit',['blog' => $blog->find($id)]);

    }
    public function update($id,Request $request)
    {
        $valid = $request->validate([
            'title' => 'required|min:4|max:100',
            'content' => 'min:4|max:100'

        ]);
        $message = Post::find($id);
        $message->title = $request->input('title');
        $message->content = $request->input('content');
        $message->save();
        return redirect()->route('posts');


    }
    public function delete($id) {
        Post::query()->find($id)->delete();
        return redirect()->route('posts');

    }
    public function reg_page()
    {
        return view('reg');
    }

    public function auth_page()
    {
        return view('auth');
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('main_page'));
    }


}
