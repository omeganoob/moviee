<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request) {
        $creds = $request->only(['email','password']);
        if(!$token = auth()->attempt($creds)) {
            return response()->json([
                'success' => false
            ]);
        }
        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => auth()->user()
        ]);
    }

    public function register(Request $request) {
        $user = new User();
        $user->name =  $request->name;
        $user->email =  $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return $this->login($request);
    }
}
