<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $token = $user->createToken('gohealth-mobile')->plainTextToken;

        return response()->json([
            'message' => 'Register berhasil',
            'token' => $token,
            'user' => array_merge($user->toArray(), [
                'photo_url' => $user->photo ? asset('storage/' . $user->photo) : null,
            ]),
        ], 201);
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (! $user || ! Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'message' => 'Email atau password salah',
            ], 422);
        }

        $user->tokens()->delete(); // opsional: 1 device = 1 token aktif
        $token = $user->createToken('gohealth-mobile')->plainTextToken;

        return response()->json([
            'message' => 'Login berhasil',
            'token' => $token,
            'user' => array_merge($user->toArray(), [
                'photo_url' => $user->photo ? asset('storage/' . $user->photo) : null,
            ]),
        ]);
    }

    public function logout(Request $request)
    {
        optional($request->user()->currentAccessToken())->delete();

        return response()->json([
            'message' => 'Logout berhasil',
        ]);
    }
}
