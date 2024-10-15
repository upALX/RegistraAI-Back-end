<?php

require_once __DIR__.'/../vendor/autoload.php';

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
    dirname(__DIR__)
))->bootstrap();

date_default_timezone_set(env('APP_TIMEZONE', 'UTC'));

$app = new Laravel\Lumen\Application(dirname(__DIR__));

$app->register(Illuminate\Auth\AuthServiceProvider::class);
$app->register(Nuwave\Lighthouse\LighthouseServiceProvider::class);
$app->register(Illuminate\Session\SessionServiceProvider::class);
$app->register(Illuminate\Cookie\CookieServiceProvider::class);

$app->configure('logging'); 
$app->configure('lighthouse');
$app->configure('auth');
$app->configure('session');

class_alias(Illuminate\Support\Facades\Cookie::class, 'Cookie');

$app->middleware([
    // Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
    Illuminate\Session\Middleware\StartSession::class,
    Nuwave\Lighthouse\Http\Middleware\AcceptJson::class,
    Nuwave\Lighthouse\Http\Middleware\AttemptAuthentication::class,
]);

$app->withFacades();
$app->withEloquent();

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);
$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->router->group([
    'namespace' => 'App\Http\Controllers',
], function ($router) {
    require __DIR__.'/../routes/web.php';
});

return $app;
