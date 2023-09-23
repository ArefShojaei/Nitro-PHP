<?php

/**
 * @package
 */
use Core\Utils\Env;

/**
 * @desc all app configs
 * @type {array}
 * return {array}
 */
return [
    /**
     * @desc app name
     * @example
     * # Nitro PHP
     * 
     * @type {string}
     * @return {string}
     */
    "name" => Env::get("APP_NAME"),
    
    /**
     * @desc app host
     * @example
     * # localhost || nitro.php || ...
     * 
     * @type {string}
     * @return {string}
     */
    "host" => Env::get("APP_HOST"),    
    
    /**
     * @desc app port
     * @example
     * # 5000 || 8000 || ... 
     * 
     * @type {string}
     * @return {string}
     */
    "port" => Env::get("APP_PORT"),
    
    /**
     * @desc App mode
     * @example
     * # development || production
     * 
     * @type {string}
     * @return {string}
     */
    "mode" => Env::get("APP_MODE"),
];