<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthLoginMutation
{
    public function __invoke($_, array $args, $context)
    {
        if (Auth::user()) {
            print_r('entrou');
            return [
                'success' => true,
                'message' => 'User already authenticated',
                'user' => Auth::user(),
            ];
        }

        $user = User::where('email', $args['email'])->first();

        if (!$user || !Hash::check($args['password'], $user->password)) {
            print_r('Credenciais inválidas para o usuário: ' . $args['email'] . "\n");
            return [
                'success' => false,
                'message' => 'Invalid credentials',
                'user' => null,
            ];
        }

        Auth::login($user);

        request()->session()->regenerate();

        return [
            'success' => true,
            'message' => 'Logged in successfully',
            'user' => Auth::user(),
        ];
    }
}
