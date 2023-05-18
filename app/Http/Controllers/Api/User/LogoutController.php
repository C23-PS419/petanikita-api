<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function __invoke()
    {
        $token = request()->user()->currentAccessToken();

        $token->delete();

        return response()->json([
            'message' => 'Token revoked.',
        ]);
    }
}
