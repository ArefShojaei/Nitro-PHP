<?php

/**
 * @namespace
 */
namespace Core\Utils;

/**
 * @package
 */
use Core\Contracts\Interfaces\Bcrypt as BcryptInterface;


/**
 * @desc bcrypt password
 * @class
 * @implements {BcryptInterface}
 */
class Bcrypt implements BcryptInterface {
    /**
     * @desc hash password
     * @method
     * @public
     * @static
     * @name hash
     * @param {string} $password
     * @return {string}
     */
    public static function hash(string $password): string {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * @desc compare password
     * @method
     * @public
     * @static
     * @name compare
     * @param {string} $password
     * @param {string} $hashedPassword
     * @return {boolean}
     */
    public static function compare(string $password, string $hashedPassword): bool {
        return password_verify($password, $hashedPassword);
    }
}