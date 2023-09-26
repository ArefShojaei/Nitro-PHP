<?php

use Core\Routing\Router;
use Core\Utils\Env;
use Core\Logger\Logger;
use Core\Http\{ Request, Response };


require_once "routes/web.php";
require_once "routes/api.php";


new Logger([
    "type" => "simple"
]);

new Env();


Router::getInstance(
    new Request(),
    new Response()
);