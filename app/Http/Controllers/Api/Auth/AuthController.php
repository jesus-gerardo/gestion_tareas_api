<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'Error' => ['Correo/Contraseña Incorrecto.'],
            ]);
        }

        $token = $user->createToken('API Token')->plainTextToken;
        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => $user
        ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens->each(function ($token) {
            $token->delete();
        });

        return response()->json(['message' => 'Logout exitoso']);
    }
}
