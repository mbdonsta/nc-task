<?php

namespace App\Services;

use App\Models\User;

class UserService {
    public function create(array $attributes): User
    {
        $attributes['password'] = bcrypt($attributes['password']);

        return User::create($attributes);
    }
}
