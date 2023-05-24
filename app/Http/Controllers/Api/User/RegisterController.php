<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
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
            'phone' => ['required', 'string', 'min:10', 'max:13'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        try {
            User::create($request->only([
                'name',
                'email',
                'phone',
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

        return response(null, 201);
    }
}
