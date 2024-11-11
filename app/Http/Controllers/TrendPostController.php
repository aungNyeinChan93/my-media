<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrendPostController extends Controller
{
    // trend posts index page
    public function index()
    {
        return view("admin.trendPost.index");
    }
}
