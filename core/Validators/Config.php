<?php

namespace Core\Validators;


class Config {
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
            throw new \Exception("The Config file doesn't exists!");
        }
    }
}