<?php

/**
 * @namespace
 */
namespace Core\Utils;

/**
 * @package
 */
use Core\{
    Contracts\Interfaces\Config as ConfigInterface,
    Validators\Config as Validator
};


/**
 * @desc Config Utility
 * @class
 * @implements {ConfigInterface}
 */
class Config {
    /**
     * @desc base folder path 
     * @prop
     * @private
     * @constant {string}
     * @default
     * @return {string}
     */
    private const BASE_PATH = "configs/";

    /**
     * @desc loaded config data like an Array from a config file in "config/{filename}.php"
     * @prop
     * @private
     * @return {array}
     */
    private static $loadedConfigData;

    /**
     * @desc find the config file
     * @method
     * @private
     * @static
     * @name find
     * @param {string} $filename - the config filename
     * return {self}
     */
    private static function find(string $filename): self {
        # get full file path
        $file = self::BASE_PATH . $filename . ".php";
        
        # check for existsing the Config file
        Validator::checkFileExists($file);

        # include file & save config data
        self::$loadedConfigData = include $file;

        # access to other methods of this class
        return new self;
    }

    /**
     * @desc get value of the loaded config data by key
     * @method
     * @public
     * @static
     * @name get
     * @param {string} $keyword
     * @example Config::get("app.name") # Nitro-PHP
     * @return {mixed}
     */
    public static function get(string $keyword): mixed {
        list($filename, $key) = explode(".", $keyword);

        self::find($filename);

        return self::$loadedConfigData[$key];
    }

    /**
     * @desc get all keys & values of the loaded config data
     * @method
     * @public
     * @static
     * @name all
     * @return {array} 
     */
    public static function all(): array {
        return self::$loadedConfigData;
    }
}