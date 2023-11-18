<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Hash;
use DB;

class AuthenticationController extends Controller
{
    public function login(Request $request) 
    {
        DB::beginTransaction();
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken($request->email)->plainTextToken;

        $user->remember_token = $token;
        $user->save();
        DB::commit();

        return $token;
    }

    public function logout(Request $request) 
    {
        DB::beginTransaction();
        $user = User::findOrFail($request->user()->id);
        $user->remember_token = null;
        $user->save();
        DB::commit();
        $request->user()->currentAccessToken()->delete();
    }
}
