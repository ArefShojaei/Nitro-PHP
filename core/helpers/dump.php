<?php

/**
 * @desc dump & die function for dumping array data
 * @function dd
 * @param {array} $data
 * @param {boolean} $isDied
 * @return {void}
 */
function dd(array $data, bool $isDied = true): void {
    print_r($data);
    $isDied && exit;
}