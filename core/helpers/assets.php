<?php

/**
 * @desc get protocol and host of a URL
 * @function getProtocolAndHost
 * @return {string} 
 */
function getProtocolAndHost(): string {
    return $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . "/"; 
}

/**
 * @desc css asset file path
 * @function css
 * @param {string} $filename - css filename
 * @return {string} 
 */
function css(string $filename): string {
    return getProtocolAndHost() . resourcesPath("/assets/css/") . $filename . ".css";
}

/**
 * @desc js asset file path
 * @function js
 * @param {string} $filename - js filename
 * @return {string} 
 */
function js(string $filename): string {
    return getProtocolAndHost() . resourcesPath("/assets/js/") . $filename . ".js";
}

/**
 * @desc asset file path
 * @function asset
 * @param {string} $file - asset file + path
 * @return {string} 
 */
function asset(string $filePath): string {
    return getProtocolAndHost() . resourcesPath("/assets/") . ltrim($filePath, "/");
}