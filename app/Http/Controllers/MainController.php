<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function posts() {
        $blog = new Posts();
return view('posts', ['blog' => $blog->all()]);
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

        $message = new Posts();
        $message->title= $request->input('title');
        $message->content= $request->input('content');
        $message->created_at= $request->input("created_at");
        $message->updated_at= $request->input("updated_at");
        $message->user_id= $request->input("1");
        $message->save();
        return redirect()->route('posts')->with('success','Блог добавлен!');
    }
    public function edit($id) {
        $blog = new Posts();
       return view('edit',['blog' => $blog->find($id)]);

    }
    public function update($id,Request $request)
    {
        $valid = $request->validate([
            'title' => 'required|min:4|max:100',
            'content' => 'min:4|max:100'

        ]);
        $message = Posts::find($id);
        $message->title = $request->input('title');
        $message->content = $request->input('content');
        $message->created_at = $request->input("");
        $message->save();
        return redirect()->route('posts');


    }
    public function delete($id) {
        Posts::find($id)->delete();
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
