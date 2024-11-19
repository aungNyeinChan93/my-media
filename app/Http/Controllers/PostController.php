<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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

    // delete post
    public function delete(Post $post)
    {
        // dd($post);
        if (File::exists(public_path("/postsImage/$post->image"))) {
            // unlink(public_path() . '/postsImage/' . $post->image);
            File::delete(public_path("/postsImage/$post->image"));
        }
        $post->delete();
        return to_route("posts.index")->with('delete-post', 'Post delete success');
    }

    // edit page
    public function edit(Post $post)
    {
        // dd($post);
        $categories = Category::query()->get();
        return view('admin.post.edit', compact('categories', "post"));
    }

    // update post
    public function update(Request $request, Post $post)
    {
        // dd($request->all());
        $request->validate([
            "title" => 'required',
            "description" => 'required',
            "category" => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif'
        ]);

        if ($request->hasFile('image')) {
            if (file_exists(public_path('/postsImage/' . $post->image))) {
                File::delete(public_path('/postsImage/' . $post->image));
                // unlink(public_path("/postsImage/$post->image"));
            }
            $fielName = uniqid() . "_anc_" . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path("/postsImage"), $fielName);
        }

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
            'image' => !empty($request->hasFile('image')) ? $fielName : $post->image,
        ]);

        return to_route('posts.index')->with('update-post', "Update post success!");
    }

    #####
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
