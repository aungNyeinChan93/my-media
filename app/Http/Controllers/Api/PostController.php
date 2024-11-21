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
        $posts = Post::query()->orderBy('created_at', 'desc')
            ->get(['id', 'title', 'description', 'image', 'category_id']);
        return response()->json([
            'mess' => 'success',
            'data' => $posts
        ], 200);
    }

    // posts search
    public function search(Request $request)
    {
        $posts = Post::where('title', 'like', '%' . $request->key . '%')->get();
        return response()->json([
            "message" => 'success',
            'data' => $posts
        ], 200);
    }
}
