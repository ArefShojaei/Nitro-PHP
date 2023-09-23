<?php

/**
 * @namespace
 */
namespace Core\Utils;

/**
 * @package
 */
use Core\{
    Validators\Env as Validator,
    Contracts\Interfaces\Env\Env as EnvInterface
};


/**
 * @desc Access to Env Variables 
 * @class
 * @implements {EnvInterface}
 */
class Env implements EnvInterface {
    /**
     * @desc env file extention
     * @prop
     * @private
     * @constant {string}
     * @default
     * return {string}
     */
    private const FILE_EXTENTION = '.env';

    /**
     * @desc env file path
     * @prop
     * @private
     * @constant {string}
     * @default
     * return {string}
     */
    private const FILE_PATH = self::FILE_EXTENTION;

    
    /**
     * @desc init Env configuration
     * @method
     * @public
     * @static
     * @name init
     * @return {void}
     */
    public static function init(): void {
        # check for existsing the Env file
        Validator::checkFileExists(self::FILE_PATH);

        # build pattern & set to "$_ENV" global variables
        self::buildPattern();
    }

    /**
     * @desc build pattern for getting and setting key & values of the Env file content
     * @method
     * @private
     * @static
     * @name buildPattern
     * @return {void}
     */
    private static function buildPattern(): void {
        # parse the Env file content
        $content = self::parse(self::FILE_PATH);

        # declare regex pattern for getting keys & values
        $pattern = "/(\w+)\s*=\s*(.+)/";

        # check for matching the regex 
        preg_replace_callback($pattern, function($matches) {
            # get key of the Env variable
            $key = $matches[1];
            
            # get value of the Env variable
            $value = $matches[2];

            # set to "$_ENV" global variables
            $_ENV[$key] = $value;
        }, $content);
    }

    /**
     * @desc prase the Env file content
     * @method
     * @private
     * @static
     * @name parse
     * @param {string} $file - "filePath + filename"
     * @return {string}
     */    
    private static function parse(string $file): string {
        # read & get the file content
        return file_get_contents($file);
    }

    /**
     * @desc get by key name of the Env 
     * @method
     * @private
     * @static
     * @name get
     * @param {string} $key - key name
     * @return {string}
     */      
    public static function get(string $key): string {
        # get key from "$_ENV" global variables
        return $_ENV[$key];
    }
    
    /**
     * @desc get all keys & values 
     * @method
     * @private
     * @static
     * @name all
     * @return {array}
     */       
    public static function all(): array {
        # get all variables from "$_ENV" global variables
        return $_ENV;
    }
}