<?php

/**
 * @package
 */
use Core\{
    Routing\Router,
    Utils\Env,
    Logger\Logger,
    App\App
};
use Core\Http\{ Request, Response };
use Core\Containers\{
    Event\Event,
    State\State,
    Ioc\Ioc,
};


# create an instance of the App
$app = new App();


# use IOC container for binding objects
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
    return Router::getInstance(
        $container->resolve("Request"),
        $container->resolve("Response")
    );
});


# get Event object of the container objects
$event = $app->resolve("Event");

# disaptch new event for starting the app
$event->dispatch("app.start", $app);


# return event object
return $event;