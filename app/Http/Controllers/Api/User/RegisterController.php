<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
                'message' => Str::of($e->errorInfo[2])
                    ->before("\n")
                    ->trim(),
            ], 409);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }

        return UserResource::make($user)
            ->response()
            ->setStatusCode(201);
    }
}
