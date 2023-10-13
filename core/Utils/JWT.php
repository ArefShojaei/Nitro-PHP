<?php

/**
 * @namespace
 */
namespace Core\Utils;


/**
 * @package
 */
use Core\Contracts\Interfaces\JWT as JWT_Interface;


/**
 * @desc json web token (JWT)
 * @class
 * @implements {JWT_Interface}
 */
class JWT implements JWT_Interface {
    /**
     * @desc header config for the token
     * @prop
     * @private
     * @constant {array}
     * @default
     * @reutrn {array}
     */
    private const HEADER = ["alg" => "HS256", "typ" => "JWT"];
    
    /**
     * @desc algorithm for "hash_hmac" function arg
     * @prop
     * @private
     * @constant {string}
     * @default
     * @reutrn {string}
     */
    private const ALG = "SHA256";



    /**
     * @desc sign token
     * @method
     * @public
     * @static
     * @name sign
     * @param {array} $payload
     * @param {string} $secretKey
     * @return {string}
     */
    public static function sign(array $payload, string $secretKey): string {
        $header = json_encode(self::HEADER);
        $headerBase64Url = self::encodeBase64Url($header);
        
        $payload = json_encode($payload);
        $payloadBase64Url = self::encodeBase64Url($payload);
        
        $signature = hash_hmac(self::ALG, "{$headerBase64Url}.{$payloadBase64Url}", $secretKey, true);
        $signatureBase64Url = self::encodeBase64Url($signature);


        return "{$headerBase64Url}.{$payloadBase64Url}.{$signatureBase64Url}";
    }

    /**
     * @desc verify token
     * @method
     * @public
     * @static
     * @name verify
     * @param {string} $token
     * @param {string} $secretKey
     * @return {array|null}
     */
    public static function verify(string $token, string $secretKey): array|null {
        list($headerBase64Url, $payloadBase64Url, $signatureBase64Url) = explode(".", $token);

        $header = json_decode(self::decodeBase64Url($headerBase64Url));
        $payload = json_decode(self::decodeBase64Url($payloadBase64Url), true);

        if (!$header || !$payload) {
            return null;
        }

        $signature = self::decodeBase64Url($signatureBase64Url);
        $expectedSignature = hash_hmac(self::ALG, "{$headerBase64Url}.{$payloadBase64Url}", $secretKey, true);

        if ($signature !== $expectedSignature) {
            return null;
        }

        return $payload;
    }

    /**
     * @desc encode base64-url
     * @method
     * @private
     * @static
     * @name encodeBase64Url
     * @param {mixed} $data
     * @return {string}
     */
    private static function encodeBase64Url(mixed $data): string {
        $base64 = base64_encode($data);

        $base64Url = str_replace(["=", "+", "/"], ["", "-", "_"], $base64);

        return $base64Url;
    }

    /**
     * @desc decode base64-url
     * @method
     * @private
     * @static
     * @name decodeBase64Url
     * @param {mixed} $data
     * @return {string}
     */
    private static function decodeBase64Url(mixed $data): string {
        $base64 = str_replace(["-", "_"], ["+", "/"], $data);

        return base64_decode($base64);
    }
}