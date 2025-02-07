<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\CreateUser;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class UsersCreate
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected CreateUser $repository)
    {
        //
        $this->repository = $repository;
    }

    public function execute(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'in:admin,user',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'user',
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(['user' => $user, 'token' => $token]);
    }
}
