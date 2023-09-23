<?php

/**
 * @namespace
 */
namespace Core\Contracts\Interfaces\Env;


/**
 * @desc declare contracts for the Env Validator
 * @interface
 * @name EnvValidator
 */
interface EnvValidator {
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