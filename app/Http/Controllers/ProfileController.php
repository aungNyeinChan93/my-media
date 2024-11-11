<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function profilePage()
    {
        // $user = User::query()->select('name', 'email', 'gender', 'address')->where('id', Auth::user()->id)->firstOrFail();

        $user = User::findOrFail(Auth::user()->id);
        return view("admin.profile.profile", compact('user'));
    }

    // profile update {put}
    public function profileUpdate(Request $request)
    {
        $fields = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'gender' => ['required'],
            'address' => ['required'],
        ]);
        User::find($request->user_id)->update($fields);
        return back()->with("profile.update", "Profile successfully updated!");
    }
}
