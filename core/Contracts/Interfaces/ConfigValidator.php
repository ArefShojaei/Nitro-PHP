<?php

/**
 * @namespace
 */
namespace Core\Contracts\Interfaces;


/**
 * @desc declare contracts for Env Validator
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