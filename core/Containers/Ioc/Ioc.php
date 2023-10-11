<?php

/**
 * @namespace
 */
namespace Core\Containers\Ioc;

/**
 * @desc IOC (inversion of controll) container
 * @class
 */
class Ioc {
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
     * @desc add object to the container 
     * @method
     * @public
     * @name bind
     * @param {string} $abstract - object name
     * @param {string} $concrete - callback of the object
     * @return {void}
     */
    public function singleton(string $abstract, callable $concrete): void {
        $this->bind($abstract, $concrete);
    }

    /**
     * @desc get the object of the container 
     * @method
     * @public
     * @name resolve
     * @param {string} $abstract - object name
     * @return {object|callback}
     */
    public function resolve(string $abstract): object|callable {
        $concrete = isset($this->instances[$abstract]) ? $this->instances[$abstract] : throw new \Exception("The abstract not declared!");
    
        return is_callable($concrete) ? $concrete($this) : $concrete;
    }
}