<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // post index page
    public function index()
    {
        $posts = Post::query()->orderBy('id', 'desc')->get();
        return view('admin.post.index', compact('posts'));
    }

    // post create page
    public function create()
    {
        $categories = Category::query()->get();
        return view("admin.post.create", compact('categories'));
    }

    // createAction
    public function createAction(Request $request)
    {
        dd($request->all(), $request->file());
    }
}
