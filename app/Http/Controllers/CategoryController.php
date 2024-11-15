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

    // category edit page
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    // category update action 
    public function update(Request $request, Category $category)
    {
        // dd($request->all());
        $fields = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $category->update($fields);
        return to_route("categories.index")->with('category-update', 'Category update success!');
    }

    // search category 
    public function search(Request $request)
    {
        // dd($request->all());
        $categories = Category::query()->whereAny(['name', 'description'], 'like', "%" . $request->searchKey . "%")->get();
        // dd($categories);
        return view('admin.category.category', compact('categories'));
    }
}
