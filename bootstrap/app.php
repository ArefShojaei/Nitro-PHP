<?php

/**
 * @package
 */
use Core\App\App;


# create an instance of the App
$app = new App();

# get object containers 
$registerObjects = require_once "bootstrap/containers/objects.php";

# get event containers
$registerEvents = require_once "bootstrap/containers/events.php";

# register object containers (IOC)
$registerObjects($app);


# return event object
return $registerEvents($app);