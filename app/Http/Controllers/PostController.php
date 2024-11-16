<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // post index page
    public function index()
    {
        $posts = Post::query()->orderBy('id', 'desc')->get();
        return view('admin.post.index', compact('posts'));
    }
}
