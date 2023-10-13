<?php

/**
 * @package
 */
use Core\Http\{ Request, Response };
use Core\{
    Routing\Router,
    Utils\Env,
    Logger\Logger,
};
use Core\Containers\{
    Event\Event,
    State\State,
    Ioc\Ioc,
};


/**
 * @desc register objects as "IOC" container
 * @return {callback}
 */
return function(object $app): void {
    $app->bind("Event", function($container) {
        return new Event();
    });
    
    $app->bind("Logger", function($container) {
        return new Logger(["type" => "dev"]);
    });
    
    $app->bind("Request", function($container) {
        return new Request();
    });
    
    $app->bind("Response", function($container) {
        return new Response();
    });
    
    $app->singleton("Router", function($container) {
        global $app;
        
        return Router::getInstance(
            $app->resolve("Request"),
            $app->resolve("Response")
        );
    });
};