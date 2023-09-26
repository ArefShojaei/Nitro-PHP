<?php

/**
 * @namespace
 */
namespace Core\Contracts\Interfaces;


/**
 * @desc declare contracts for the Env Utility
 * @interface
 * @name Env
 */
interface Env {
    /**
     * @desc declare the "get" method for getting key by name
     * @method
     * @public
     * @static
     * @name get
     * @param {string} $key - key name
     * @return {string}
     */
    public static function get(string $key): string;
    
    /**
     * @desc declare the "all" method for getting all variables
     * @method
     * @public
     * @static
     * @name all
     * @return {array}
     */    
    public static function all(): array;
}