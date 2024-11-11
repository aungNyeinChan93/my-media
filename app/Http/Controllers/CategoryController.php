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
}
