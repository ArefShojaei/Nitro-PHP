<?php

/**
 * @namespace
 */
namespace Core\Contracts\Interfaces;

/**
 * @desc declare contracts for View Validator 
 * @interface
 * @name ViewValidator
 */
interface ViewValidator {
    /**
     * @desc declare the "checkFileExists" method for checking file
     * @method
     * @public
     * @static
     * @name checkFileExists
     * @param {string} $file - view( template engine file ) file
     * @return {void}
     */
    public static function checkFileExists(string $file): void;
}