<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminListController extends Controller
{
    // admin list view
    public function list()
    {
        $users = User::query()->paginate(5);
        return view("admin.admins.list", compact('users'));
    }
}
