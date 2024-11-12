<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        ], [
            "name.required" => "အမည်လိုအပ်သည်။",
            "email.required" => "အီးမေးလ် လိုအပ်ပါသည်။",
            "address.required" => "လိပ်စာနယ်ပယ်လိုအပ်သည်။",
        ]);
        User::find($request->user_id)->update($fields);
        return back()->with("profile.update", "Profile sucessfully updated!");
    }

    // profile View
    public function profileView()
    {

        return view("admin.profile.profileView");
    }

    // password change view
    public function passwordChange()
    {
        return view('admin.profile.passwordChange');
    }

    // password change Action
    public function passwordChangeAction(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'oldPassword' => 'required|min:6',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6|same:password',
        ]);

        if (!Hash::check($request->oldPassword, Auth::user()->password)) {
            return back()->withErrors([
                'oldPassword' => ['The provided password does not match old password!']
            ]);
        }
        User::find(Auth::user()->id)->update([
            'password' => Hash::make($request->password)
        ]);

        return to_route("dashboard")->with("password-change", "Password Change Success!");
    }
}
