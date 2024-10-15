<?php 

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Auth;
use Nuwave\Lighthouse\Execution\HttpGraphQLContext;

class AuthLogoutMutation
{
    public function __invoke($_, array $args, HttpGraphQLContext $context)
    {

        $request = $context->request(); 
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $cookie = \Illuminate\Support\Facades\Cookie::forget('lumen_session'); 
        return response()->json(['success' => true])->withCookie($cookie);
    }
}
