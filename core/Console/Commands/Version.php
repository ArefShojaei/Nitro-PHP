<?php

/**
 * @namespace
 */
namespace Core\Console\Commands;

/**
 * @package
 */
use Core\Contracts\Interfaces\Command as CommandInterface;


/**
 * @desc version command
 * @class
 * @implements {CommandInterface}
 */
class Version implements CommandInterface {
    /**
     * @desc show PHP version
     * @method
     * @public
     * @name show
     * @return {void}
     */
    public function show(): void {
        echo "* PHP version: " . phpversion();
    }
}