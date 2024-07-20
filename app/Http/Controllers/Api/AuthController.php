<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //register seller
    public function registerSeller(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed',
            'phone' => 'required|string',
            'address' => 'required|string',
            'country' => 'required|string',
            'province' => 'required|string',
            'city' => 'required|string',
            'district' => 'required|string',
            'postal_code' => 'required|string',
            'photo' => 'required|image|mimes|mimes:jpg,jpeg,png|max:2048',
        ]);
        $photo = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('assets/user', 'public');
        }

        $user = User::created([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'country' => $request->country,
            'province' => $request->province,
            'city' => $request->city,
            'district' => $request->district,
            'postal_code' => $request->postal_code,
            'roles' => 'seller',
            'photo' => $photo,
        ]);
        // $token = $user->createToken('token-name')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'User registered',
            'data' => $user,
        ],201);
    }
}
