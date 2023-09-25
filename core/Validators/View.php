<?php

/**
 * @namespace
 */
namespace Core\Validators;

/**
 * @package
 */
use Core\Contracts\View\ViewValidator as ViewValidatorInterface;


/**
 * @desc View validator
 * @class
 * @implements {ViewValidatorInterface}
 */
class View implements ViewValidatorInterface {
    /**
     * @desc check for existsing view file
     * @method
     * @public
     * @static
     * @name checkFileExists
     * @param {string} $file - view file
     * @return {void}
     */
    public static function checkFileExists(string $file): void {
        if(!file_exists($file)) {
            throw new \Exception("The template doesn't exists!");
        }
    }
}