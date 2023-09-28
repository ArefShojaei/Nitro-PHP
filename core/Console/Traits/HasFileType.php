<?php

/**
 * @namespace
 */
namespace Core\Console\Traits;


trait HasFileType {
    /**
     * @desc controller file content
     * @method
     * @private
     * @name controller
     * @param {string} $filename
     * @return {string}
     */
    private function controller(string $filename): string {}

    /**
     * @desc middleware file content
     * @method
     * @private
     * @name controller
     * @param {string} $filename
     * @return {string}
     */
    private function middleware($filename): string {}

    /**
     * @desc service file content
     * @method
     * @private
     * @name controller
     * @param {string} $filename
     * @return {string}
     */
    private function service($filename): string {}

    /**
     * @desc model file content
     * @method
     * @private
     * @name controller
     * @param {string} $filename
     * @return {string}
     */
    private function model($filename): string {}
}