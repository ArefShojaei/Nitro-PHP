<?php

/**
 * @namespace
 */
namespace Core\Contracts\Interfaces;


/**
 * @desc declare contracts for the Bcrypt
 * @interface
 * @name Bcrypt
 */
interface Bcrypt {
    /**
     * @desc declare the "hash" method for hashing password
     * @method
     * @public
     * @static
     * @name hash
     * @param {string} $password
     * @return {string}
     */
    public static function hash(string $password): string;

    /**
     * @desc declare the "compare" method for comparing password
     * @method
     * @public
     * @static
     * @name compare
     * @param {string} $password
     * @param {string} $hashedPassword
     * @return {boolean}
     */
    public static function compare(string $password, string $hashedPassword): bool;
}