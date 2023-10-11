<?php

/**
 * @namespace
 */
namespace Core\App;

/**
 * @package
 */
use Core\App\Traits\{ HasContainer };



/**
 * @desc App container processes
 * @class
 */
class App {
    /**
     * @desc import traits
     */
    use HasContainer;

    /**
     * @desc object instances
     * @prop
     * @private
     * @type {array}
     * @default
     * @return {array}
     */
    private array $instances = [];


    /**
     * @desc start the app
     * @method
     * @public
     * @name start
     * @return {void}
     */
    public function boot() {
        $this->regsiterProviders();
        $this->regsiterRoutes();
    }
}