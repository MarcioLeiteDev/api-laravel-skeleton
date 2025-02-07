<?php

namespace App\Repositories;

use App\Models\User;

class CreateUser
{

    public function createUser($data)
    {
        return User::create($data);
    }
}
