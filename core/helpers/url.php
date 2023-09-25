<?php

/**
 * @desc current request url
 * @function url
 * @return {string}
 */
function url(): string {
    return $_SERVER['REQUEST_URI'];
}
