<?php

require_once "core/Autoload.php";

new Autoload();

$event = require_once "bootstrap/app.php";

$event->on("app.start", function($app) {
    $app->start($app);
});