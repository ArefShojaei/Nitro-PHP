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

    private function loadClasses() {
        return spl_autoload_register(function($className) {
            $classes = $this->contracts->classes;

            foreach($classes as $class) {
                $file = str_replace("\\", "/", $className) . ".php";

                return file_exists($file) && require_once $file;
            }
        });
    }
}