<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        try {

            $user = User::create($request->only([
                'name',
                'email',
                'password',
            ]));

        } catch (QueryException $e) {
            return response()->json([
                'message' => str($e->errorInfo[2])
                    ->after('DETAIL:  '),
            ], 409);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }

        return response()->json([
            'message' => 'Register success.',
            'data' => $user,
        ], 201);
    }
}
