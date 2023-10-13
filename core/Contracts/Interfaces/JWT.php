<?php

/**
 * @namespace
 */
namespace Core\Contracts\Interfaces;


/**
 * @desc declare contracts for the JWT
 * @interface
 * @name JWT
 */
interface JWT {
    /**
     * @desc declare the "sign" method for signing token
     * @method
     * @public
     * @static
     * @name sign
     * @param {array} $payload
     * @param {string} $secretKey
     * @return {string}
     */
    public static function sign(array $payload, string $secretKey): string;

    /**
     * @desc declare the "verify" method for verifying token
     * @method
     * @public
     * @static
     * @name verify
     * @param {string} $token
     * @param {string} $secretKey
     * @return {array|null}
     */
    public static function verify(string $token, string $secretKey): array|null;
}