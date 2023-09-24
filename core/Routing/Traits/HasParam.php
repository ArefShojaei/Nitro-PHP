<?php

namespace Core\Routing\Traits;


trait HasParam {
    /**
     * @desc extract route params
     * @method
     * @private
     * @static
     * @name extractParams
     * @param {array} $matches - matched all route params
     * @return {void}
     */
    private static function extractParams(array $matches): void {
        foreach($matches as $key => $value) {
            is_string($key) && self::setParams($key, $value);
        }
    }

    /**
     * @desc set route params to the params array
     * @method
     * @private
     * @static
     * @name setParams
     * @param {string} $key - param key
     * @param {string} $value - param value
     * @return {void}
     */
    private static function setParams(string $key, string $value): void {
        self::$params[$key] = $value;
    }
}