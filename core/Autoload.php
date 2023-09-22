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
    }
}