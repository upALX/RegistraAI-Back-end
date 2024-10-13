<?php

namespace App\GraphQL\Mutations;

use App\Models\User;

class CreateUserAuthMutation
{
    public function __invoke($root, array $args)
    {
        return User::create([
            'name' => $args['name'],
            'email' => $args['email'],
        ]);
    }
}
