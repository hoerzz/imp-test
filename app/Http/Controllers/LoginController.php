<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function makeToken(Request $request)
    {
        $request->validate([
            'username' => 'required|min:2',
            'password' => 'required|min:5',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken('Api ' . $request->username)->plainTextToken;
    }

    public function deleteToken(Request $request)
    {

        $logout = $request->user()->currentAccessToken()->delete();
        if ($logout) {
            return response()->json([
                'success' => true,
                'Keluar'    => "Berhasil Keluar",
            ], 201);
        }
    }
}