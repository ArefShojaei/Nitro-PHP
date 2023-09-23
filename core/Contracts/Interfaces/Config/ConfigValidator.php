<?php

/**
 * @namespace
 */
namespace Core\Contracts\Interfaces\Config;


/**
 * @desc declare contracts for the Env Validator
 * @interface
 * @name EnvValidator
 */
interface ConfigValidator {
    /**
     * @desc declare the "checkFileExists" method for checking file
     * @method
     * @public
     * @static
     * @name checkFileExists
     * @return {void}
     */    
    public static function checkFileExists(string $file): void;
}