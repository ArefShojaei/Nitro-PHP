<?php

use Core\Routing\Router;
use Core\Utils\Env;
use Core\Logger\Logger;
use Core\Http\{ Request, Response };
use Core\App\App;


require_once "routes/web.php";
require_once "routes/api.php";


// new Logger([
//     "type" => "simple"
// ]);

// new Env();

$app = new App();

$app->bind("Logger", function($container) {
    return new Logger([
        "type" => "simple"
    ]);
});



$app->resolve("Logger");

$app->bind("Env", function($container) {
    return new Env();
});

$app->resolve("Env");


// $app->singleton("Router", "Router::getInstance", function($container) {
//     return [
//         $container->resolve("Request"),
//         $container->resolve("Response"),
//     ];
// });

// return $app;

Router::getInstance(
    new Request(),
    new Response()
);