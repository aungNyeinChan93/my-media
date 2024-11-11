<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // post index page
    public function index()
    {
        return view('admin.post.index');
    }
}
