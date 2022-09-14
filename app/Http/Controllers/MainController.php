<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MainController extends Controller
{
    /**
     * @return View
     */
    public function posts(): View
    {
        $posts = Post::query()->get();

        return view('posts', ['posts' => $posts]);
    }

    public function main_page() {
        return view('main_page');

    }

    public function create() {
        return view('post_create');

    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
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

    public function edit($id)
    {
        $post = Post::query()
            ->where('user_id', Auth::id())
            ->find($id);

        if ($post === null) {
            return back()->withErrors(['You can`t edit this post']);
        }
        $post = new Post();
       return view('edit',['post' => $post->find($id)]);

    }

    /**
     * @param string $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(string $id, Request $request): RedirectResponse
    {
        $valid = $request->validate([
            'title' => 'required|min:4|max:100',
            'content' => 'min:4|max:100'
        ]);

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('posts', ['post' => $post]);
    }

    public function delete( string $id) {
        $post = Post::query()
            ->where('user_id', Auth::id())
            ->find($id);

        if ($post === null) {
            return back()->withErrors(['You can`t delete this post']);
        }

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
