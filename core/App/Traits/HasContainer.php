<?php

/**
 * @namespace
 */
namespace Core\App\Traits;


trait HasContainer {
    /**
     * @desc add object to the container 
     * @method
     * @public
     * @name bind
     * @param {string} $abstract - object name
     * @param {string} $concrete - callback of the object
     * @return {void}
     */
    public function bind(string $abstract, callable $concrete): void {
        $this->instances[$abstract] = $concrete;
    }

    /**
     * @desc get the object of the container 
     * @method
     * @public
     * @name bind
     * @param {string} $abstract - object name
     * @return {object}
     */
    public function resolve(string $abstract): object|callable {
        $concrete = isset($this->instances[$abstract]) && $this->instances[$abstract];
    
        return is_callable($concrete) ? $concrete($this) : $concrete;
    }
}