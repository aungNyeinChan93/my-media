<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // register
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $fields['password'] = Hash::make($request->password);
        $user = User::create($fields);
        $token = $user->createToken($user->name)->plainTextToken;
        return response()->json([
            'message' => 'register success',
            'data' => $user,
            'token' => $token
        ]);
    }

    // login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            "password" => "required|max:255"
        ]);

        $user = User::where('email', $request->email)->firstOrFail();

        if (isset($user)) {
            if (!Hash::check($request->password, $user->password)) {
                return response()->json([
                    'message' => "your password is wrong!"
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Something Wrong ...!'
            ]);
        }

        $token = $user->createToken($user->name)->plainTextToken;

        return response()->json([
            "message" => 'login success!',
            "data" => $user,
            'token' => $token,
        ]);
    }

    // logout
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        $user = $request->user()->name;
        return response()->json([
            'message' => 'logout success!',
            'data' => $user
        ]);
    }
}
