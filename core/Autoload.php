<?php

/**
 * @desc Autoloading for classes & functions
 * @class
 */
class Autoload {
    /**
     * @desc JSON contracts content like classes & functions for Autoloading
     * @prop
     * @private
     * @type {object}
     * @return {object}
     */
    private object $contracts; 

    /**
     * @constructor
     */
    public function __construct() {
        # set the json data as a object
        $this->contracts = $this->parse();

        # load classes
        $this->loadClasses();
        
        # load functions
        $this->loadFunctions();
    }

    /**
     * @desc parse autoload JSON file
     * @method
     * @private
     * @return {object}
     */
    private function parse(): object {
        # get autoload.json content
        $jsonContent = file_get_contents("autoload.json");

        # decode the json content to an object
        return json_decode($jsonContent);
    }

    /**
     * @desc Load classes 
     * @method
     * @private
     * @name loadClasses
     * @return {void}
     */
    private function loadClasses(): void {
        # register autoload for classes
        spl_autoload_register(function($className) {
            # replace "\\" to "/" that converts to a string as a file path of a namespace
            $file = str_replace("\\", "/", $className) . ".php";

            # check for existsing the file for including
            file_exists($file) && require_once $file;
        });
    }

    /**
     * @desc Load functions 
     * @method
     * @private
     * @name loadFunctions
     * @return {void}
     */
    private function loadFunctions(): void {
        # get all paths
        $paths = $this->contracts->functions;

        foreach($paths as $path) {
            # get list of all files in that directory 
            $files = scandir($path);

            # remove "." & ".." from the array
            unset($files[0]);
            unset($files[1]);

            # get values of the array in a new Array
            $functions = array_values($files);

            foreach($functions as $function) {
                # contact path and filename as a function
                $file = $path . $function;
        
                # check for existsing the file for including
                file_exists($file) && require_once $file;
            }
        }
    } 
}