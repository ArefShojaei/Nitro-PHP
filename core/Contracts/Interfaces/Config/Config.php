<?php

/**
 * @namespace
 */
namespace Core\Contracts\Interfaces\Config;


/**
 * @desc declare contracts for the Config Utility
 * @interface
 * @name Config
 */
interface Config {
    /**
     * @desc declare the "find" method for finding a config file
     * @method
     * @public
     * @static
     * @name find
     * @param {string} $filename - the config filename
     * @return {self}
     */
    public static function find(string $filename): self;

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
     * @desc declare the "all" method for getting all loaded config data
     * @method
     * @public
     * @static
     * @name all
     * @return {array}
     */    
    public static function all(): array;
}