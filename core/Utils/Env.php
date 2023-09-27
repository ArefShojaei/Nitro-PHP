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
    Contracts\Interfaces\Env as EnvInterface
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
     * @desc all variables of the .env file
     * @prop
     * @private
     * @static
     * @type {array}
     * @default
     * return {array}
     */
    private static $variables = [];

    
    /**
     * @constructor
     */
    public function __construct() {
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

            # set to the $variables of this class
            self::$variables[$key] = $value;
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
     * @desc get key by name 
     * @method
     * @private
     * @static
     * @name get
     * @param {string} $key - key name
     * @return {string}
     */      
    public static function get(string $key): string {
        return self::$variables[$key];
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
        return self::$variables;
    }
}