<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nuwave\Lighthouse\GraphQL;

class GraphQLController extends Controller
{
    public function handleRequest(Request $request, GraphQL $graphqlInterpreter)
    {
        // O lighthouse faz a interpretação e execução das queries/mutations
        return $graphqlInterpreter->executeQuery($request->input('query'), $request->all());
    }
}
