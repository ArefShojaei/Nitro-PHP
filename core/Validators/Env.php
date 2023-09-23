<?php

/**
 * @namespace
 */
namespace Core\Validators;

/**
 * @package
 */
use Core\Contracts\Interfaces\Env\EnvValidator as EnvValidatorInterface;


/**
 * @desc Env Validator
 * @class
 * @implements {EnvValidatorInterface}
 */
class Env implements EnvValidatorInterface {
    /**
     * @desc declare the "checkFileExists" method for checking file
     * @method
     * @public
     * @static
     * @name checkFileExists
     * @return {void}
     */    
    public static function checkFileExists(string $file): void {
        # check for not exsitsing the file
        if(!file_exists($file)) {
            throw new \Exception("The Env file doesn't exists!");
        }
    }
}