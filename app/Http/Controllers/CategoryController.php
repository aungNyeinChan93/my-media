<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //index category
    public function index()
    {
        $categories = Category::query()->orderBy("id", 'asc')->get();

        return view("admin.category.category", compact('categories'));
    }

    // category create
    public function create(Request $request)
    {

        $rule = [
            "name" => "required",
            "description" => "required",
        ];
        $fields = $request->validate($rule, [
            'name.required' => "အမျိုးအစားအမည်နယ်ပယ်လိုအပ်သည်",
            'description.required' => "ဖော်ပြချက်နယ်ပယ်လိုအပ်သည်"
        ]);
        $category = Category::create($fields);
        return back()->with('category-create', " $category->name created Success!");

    }

    //  category delete
    public function delete(Category $category)
    {
        $category->delete();
        return back()->with("category-delete", "$category->name deleted !");
    }
}
