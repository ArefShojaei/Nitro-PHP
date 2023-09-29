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
 * @desc current request url
 * @function url
 * @return {string}
 */
function url(): string {
    return $_SERVER['REQUEST_URI'];
}
