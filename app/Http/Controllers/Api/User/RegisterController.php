<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if (User::where('email', $request->email)->first()) {
            return response()->json([
                'message' => 'Email already registered',
            ], 409);
        }

        $user = User::create($request->only([
            'name',
            'email',
            'password',
        ]));

        return response()->json([
            'message' => 'Register success',
            'data' => $user,
        ], 201);
    }
}
