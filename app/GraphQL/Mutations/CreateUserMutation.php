<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use GraphQL\Error\Error;

class CreateUserMutation
{
    public function __invoke($root, array $args)
    {
        try {
            $existingUser = User::where('email', $args['email'])->first();
            
            if ($existingUser) {
                throw new Error('Este e-mail já está registrado.');
            }

            $user = User::create([
                'name' => $args['name'],
                'email' => $args['email'],
                'password' => Hash::make($args['password']),
            ]);

            return [
                'success' => true,
                'message' => 'Usuário criado com sucesso!',
                'user' => $user
            ];

        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Falha ao criar o usuário: ' . $e->getMessage(),
                'user' => null
            ];
        }
    }
}
