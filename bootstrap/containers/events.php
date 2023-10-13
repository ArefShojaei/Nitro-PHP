<?php

/**
 * @desc register events
 * @return {callback}
 */
return function($app) {
    # get Event object
    $event = $app->resolve("Event");

    # register app events
    $event->dispatch("app.start", $app);


    # return event container
    return $event;
};