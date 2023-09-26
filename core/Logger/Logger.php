<?php

/**
 * @namespace
 */
namespace Core\Logger;

/**
 * @package
 */
use Core\Http\Request;
use Core\Logger\Traits\HasLogType;


/**
 * @desc Logger system for logging processes 
 * @class
 */
class Logger {
    /**
     * @desc import tratis
     */
    use HasLogType;

    /**
     * @desc base folder path
     * @prop
     * @private
     * @constant {string}
     * @default
     * @return {string}
     */
    private const BASE_PATH = "storage/logs/";
    
    /**
     * @desc file extention
     * @prop
     * @private
     * @constant {string}
     * @default
     * @return {string}
     */
    private const FILE_EXTENTION = ".log";
    
    /**
     * @desc executable file for putting logs
     * @prop
     * @private
     * @constant {string}
     * @default
     * @return {string}
     */
    private const EXECUTABLE_FILE = self::BASE_PATH . "requests" . self::FILE_EXTENTION;


    /**
     * @constructor
     */
    public function __construct(array $params) {
        # get method name
        $method = lcfirst($params['type']);

        # run the log method
        $this->log($method);
    }

    /**
     * @desc log all requests and putting the data to the file content 
     * @method
     * @private
     * @name {log}
     * @param {string} $method - method name
     * @return {void}
     */
    private function log(string $method): void {
        # get the log configs as an Array
        $configData = $this->$method();

        # set default timezone
        date_default_timezone_set('asia/tehran');

        # extract the config and convert to the string
        $content = implode(" -- ", $configData) . PHP_EOL;
    
        # put the log content to the file
        file_put_contents(self::EXECUTABLE_FILE, $content, FILE_APPEND);
    }
}