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

    public function show() {

    }
}
