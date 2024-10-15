<?php

/** @var \Laravel\Lumen\Routing\Router $router */


$router->get('/gracefull', function () use ($router) {
    return $router->app->version();
});

