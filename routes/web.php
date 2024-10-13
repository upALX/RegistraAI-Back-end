<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Support\Facades\Session;

$router->get('/graphql', function () use ($router) {
    return $router->app->version();
});

$router->get('/test-session', function () {
    Session::put('key', 'value');
    return Session::get('key');
});


// $router->post('/graphql', 'GraphQLController@handleRequest');
