<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GraphQL\Type\Schema;
use GraphQL\Type\Definition\Type;
use App\GraphQL\Queries\UserQuery;
use App\GraphQL\Mutations\AuthMutations;

class GraphQLServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $schema = new Schema([
            'query' => new UserQuery(),
            'mutation' => new AuthMutations(),
        ]);

        $this->app->instance('graphql.schema', $schema);
    }
}
