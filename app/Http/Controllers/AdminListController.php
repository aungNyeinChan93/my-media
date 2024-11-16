<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminListController extends Controller
{
    // admin list view
    public function list(Request $request)
    {
        // dump($request->searchKey);
        $users = User::query()->when($request->searchKey, function ($query) use ($request) {
            $query->whereAny(["name", 'email', 'address'], 'like', "%" . $request->searchKey . "%");
        })->paginate(5);
        return view("admin.admins.list", compact('users'));
    }

    // delete admin
    public function delete(User $user)
    {
        $user->delete();
        return back()->with('delete-user', "delete success!");
    }

    // gender filter
    public function genderFilter(Request $request)
    {
        // dd($request->gender);
        $users = User::query()
            ->where('gender', "=", $request->gender)
            ->paginate(10);

        return view('admin.admins.list', compact('users'));
    }
}
