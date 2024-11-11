<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListController extends Controller
{
    // list index page
    public function index()
    {
        return view('admin.list.list');
    }
}
