<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $req = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        if ($req->fails()) {
            return response()->json([
                'message' => 'tt ban nh ko dung'
            ]);
        }

        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'message' => 'dn dd tc',
            'user' => $user
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if(!$token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'message' => 'tk h mk s'
            ]);
        }

        return response()->json([
            'token' => $token,
            'user' => Auth::user()
        ]);

    }
}
