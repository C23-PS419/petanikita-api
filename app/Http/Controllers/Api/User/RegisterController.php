<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function __invoke(UserRequest $request)
    {
        User::create($request->safe()->only([
            'name',
            'email',
            'phone',
            'password',
        ]));

        return response(['message' => 'Created.'], 201);
    }
}
