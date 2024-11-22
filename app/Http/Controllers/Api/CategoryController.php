<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class CategoryController extends Controller
{
    // category index
    public function index()
    {
        $categories = Category::get(['name', 'id', 'description']);
        return response()->json([
            'data' => $categories
        ]);
    }

    // search Category name
    public function search(Request $request)
    {
        if ($request->key != null) {
            $category = Category::query()->where('name', 'like', "%" . $request->key . "%")->firstOrFail();
            return response()->json([
                'message' => 'success',
                'data' => $category->posts
            ]);
        } else {
            $posts = Post::query()->get();
            return response()->json([
                'message' => 'success',
                'data' => $posts
            ]);
        }
    }

}
