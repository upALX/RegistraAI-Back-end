<?php

namespace App\GraphQL\Queries;

use App\Models\User;

class GetUserAuthQuery
{
    public function __invoke($root, array $args)
    {
        // Lógica para buscar um usuário pelo id
        return User::find($args['id']);
    }
}
