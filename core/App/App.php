<?php

/**
 * @namespace
 */
namespace Core\App;

/**
 * @package
 */
use Core\{
    App\Traits\HasRegister,
    Containers\Ioc\Ioc as Container
};



/**
 * @desc App container processes
 * @class
 */
class App extends Container {
    /**
     * @desc import traits
     */
    use HasRegister;


    /**
     * @desc start the app
     * @method
     * @public
     * @name start
     * @return {void}
     */
    public function start($app): void {
        $this->registerRoutes();
        $this->registerContainers($app);
    }
}