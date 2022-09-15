<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
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
        $posts = Post::query()->latest()->get();

        return view('posts', ['posts' => $posts]);
    }

    public function main_page(): View {
        return view('main_page');

    }

    public function create(): View {
        return view('post_create');

    }

    /**
     * @param StorePostRequest $request
     * @return RedirectResponse
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        $message = new Post();
        $message->title = $request->input('title');
        $message->content = $request->input('content');
        $message->user_id = $request->user()->id;

        $message->save();

        return redirect()->route('posts')->with('success', __('auth.failed'));
    }

    /**
     * @param int $id
     * @return RedirectResponse|View
     */
    public function edit(int $id): RedirectResponse|View
    {
        $post = Post::query()
            ->where('user_id', Auth::id())
            ->find($id);

        if ($post === null) {
            return back()->withErrors(['You can`t edit this post']);
        }

        return view('edit',['post' => $post]);
    }

    /**
     * @param string $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(string $id, Request $request): RedirectResponse
    {
        $validData = $request->validate([
            'title' => 'required|min:4|max:100',
            'content' => 'min:4|max:100'
        ]);

        $post = Post::query()
            ->where('user_id', Auth::id())
            ->find($id);

        if ($post === null) {
            return back()->withErrors(['You can`t edit this post']);
        }

        $post->title = $validData['title'];
        $post->content = $validData['content'];
        $post->save();

        return redirect()->route('posts', ['post' => $post]);
    }

    public function delete( string $id): RedirectResponse|View {
        $post = Post::query()
            ->where('user_id', Auth::id())
            ->find($id);

        if ($post === null) {
            return back()->withErrors(['You can`t delete this post']);
        }

        Post::query()->find($id)->delete();
        return redirect()->route('posts');
    }
    public function reg_page(): View
    {
        return view('reg');
    }

    public function auth_page(): View
    {
        return view('auth');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect(route('main_page'));
    }


}
