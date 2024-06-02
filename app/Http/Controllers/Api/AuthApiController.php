<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function response;

class AuthApiController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        if (! $request->has('name') || ! $request->has('password')) {
            return response()->json(['error' => 'Name and Password parameters is required'], 400);
        }

        $user = User::query()->where('name', $request->name)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'User not found'], 401);
        }

        return response()->json(['access_token' => $user->createToken($request->name)->plainTextToken]);
    }
}
