<?php

/**
 * @package
 */
use Core\Utils\Config;


/**
 * @desc css asset file path
 * @function css
 * @param {string} $filename - css filename
 * @return {string} 
 */
function css(string $filename): string {
    return Config::find("app")->get("host") . "resources/assets/css/" . $filename . ".css";
}

/**
 * @desc js asset file path
 * @function js
 * @param {string} $filename - js filename
 * @return {string} 
 */
function js(string $filename): string {
    return Config::find("app")->get("host") . "resources/assets/js/" . $filename . ".js";
}

/**
 * @desc asset file path
 * @function asset
 * @param {string} $file - asset file + path
 * @return {string} 
 */
function asset(string $file): string {
    return Config::find("app")->get("host") . "resources/assets/" . $file;
}