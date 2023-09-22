<?php

/**
 * @desc Autoloading for classes & functions
 * @class
 */
class Autoload {
    /**
     * @desc JSON contracts content like classes & functions for Autoloading
     * @private
     * @type {object}
     * @return {object}
     */
    private object $contracts; 

    /**
     * @constructor
     */
    public function __construct() {
        # get autoload.json content
        $jsonContent = file_get_contents("autoload.json");

        # decode the json content to a Array
        $extractedJsonContent = json_decode($jsonContent);

        # set the Array data to $contracts property
        $this->contracts = $extractedJsonContent;

        $this->loadClasses();
    }

    /**
     * @desc Load classes 
     * @method
     * @private
     * @name loadClasses
     */
    private function loadClasses(): void {
        # register autoload for classes
        spl_autoload_register(function($className) {
            # get classes of the autoload JSON config
            $classes = $this->contracts->classes;

            foreach($classes as $class) {
                # replace "\\" to "/" that converts to a string as a file path of a namespace
                $file = str_replace("\\", "/", $className) . ".php";

                # check for existsing the file for including
                file_exists($file) && require_once $file;
            }
        });
    }
}