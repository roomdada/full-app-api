<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Actions\User\StoreUserAction;
use App\Http\Requests\StoreUserRequest;

class AuthController extends Controller
{
    public function register(StoreUserRequest $request, StoreUserAction $storeUser)
    {
        $user = $storeUser->execute($request->validated());
        return response()->json([
            'status' => true,
            'message' => 'compte crée avec succès !',
            'user' => new UserResource($user)
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (! auth()->attempt($credentials)) {
          return response()->json([
                'status' => false,
                'message' => 'identifiants invalides !'
            ], 404);
        }
        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'connexion réussie !',
            'user' => new UserResource($user),
            'access_token' => $token
        ], 200);
    }

    public function logout(Request $request)
    {
        //$request->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => true,
            'message' => 'déconnexion réussie !'
        ], 200);
    }
}
