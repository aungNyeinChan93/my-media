<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    // post index page
    public function index()
    {
        $posts = Post::query()->orderBy('id', 'desc')->paginate(5);
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
        // dd($request->all(), $request->file());
        // $request->file('image')->move(public_path('/postsImage'), $request->file('image')->getClientOriginalName());

        $validate = $this->postCreateValidation($request);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        if ($request->hasFile('image')) {
            $fileName = uniqid() . '_Anc_' . $request->file("image")->getClientOriginalName();
            $request->file('image')->move(public_path('/postsImage'), $fileName);
        }

        Post::create([
            "title" => $request->title,
            "description" => $request->description,
            "category_id" => $request->category,
            "image" => !empty($request->hasFile('image')) ? $fileName : null,
            "user_id" => auth()->user()->id,
        ]);

        return to_route('posts.index')->with('create-post', 'Post create success!');
    }

    // postCreateValidation
    private function postCreateValidation($request)
    {
        return Validator::make($request->all(), [
            "title" => 'required',
            "description" => 'required',
            "category" => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif'
        ]);
    }
}
