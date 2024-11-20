<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    // index posts
    public function index()
    {
        $posts = Post::query()->orderBy('created_at', 'desc')->get();
        return response()->json([
            'mess' => 'success',
            'data' => $posts
        ], 200);
    }
}
