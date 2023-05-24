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
            'phone' => ['required', 'string', 'min:10', 'max:13', 'unique:users,phone'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create($request->only([
            'name',
            'email',
            'phone',
            'password',
        ]));

        return response(null, 201);
    }
}
