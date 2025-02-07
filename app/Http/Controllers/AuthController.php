<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use App\Actions\UsersCreate;
use App\Actions\UsersLogin;

class AuthController extends Controller
{

    public function __construct(
        protected UsersCreate $userCreate,
        protected UsersLogin $userLogin,
    ) {
        //
    }
    public function register(Request $request)
    {
        return $this->userCreate->execute($request);
    }

    public function login(Request $request)
    {
        return $this->userLogin->execute($request);
    }

    // Obter usuário autenticado
    public function me()
    {
        return response()->json(Auth::user());
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
