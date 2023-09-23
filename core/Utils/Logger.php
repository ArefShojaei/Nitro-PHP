<?php

/**
 * @namespace
 */
namespace Core\Utils;

/**
 * @package
 */
use Core\Http\Request;


/**
 * @desc Logger utility for logging requests 
 * @class
 */
class Logger {
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

    /**
     * @desc simple log config
     * @method
     * @private
     * @name {simple}
     * @return {array}
     */    
    private function simple(): array {
        return [
            "type" => "SIMPLE",
            "method" => $_SERVER["REQUEST_METHOD"],
            "code" => http_response_code(),
            "url" => $_SERVER["REQUEST_URI"],
        ];
    }

    /**
     * @desc dev log config
     * @method
     * @private
     * @name {dev}
     * @return {array}
     */       
    private function dev(): array {
        return [
            "type" => "DEV",
            "time" => date("H:i:s A"),
            "ip" => $_SERVER["REMOTE_ADDR"],
            "protocol" => $_SERVER["SERVER_PROTOCOL"],
            "method" => $_SERVER["REQUEST_METHOD"],
            "code" => http_response_code(),
            "url" => $_SERVER["REQUEST_URI"],
        ];
    }

    /**
     * @desc combined log config
     * @method
     * @private
     * @name {combined}
     * @return {array}
     */     
    private function combined(): array {
        return [
            "type" => "COMBINED",
            "date" => date("Y-m-d"),
            "time" => date("H:i:s A"),
            "ip" => $_SERVER["REMOTE_ADDR"],
            "protocol" => $_SERVER["SERVER_PROTOCOL"],
            "host" => $_SERVER["HTTP_HOST"],
            "method" => $_SERVER["REQUEST_METHOD"],
            "code" => http_response_code(),
            "url" => $_SERVER["REQUEST_URI"],
            "device" => $_SERVER["HTTP_USER_AGENT"],
        ];
    }
}