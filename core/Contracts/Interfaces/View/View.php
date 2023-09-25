<?php

/**
 * @namespace
 */
namespace Core\Contracts\Interfaces\View;


/**
 * @desc declare contracts for View (Template Engine)
 * @interface
 * @name View
 */
interface View {
    /**
     * @desc declare the "make" method for creating a new view
     * @method
     * @public
     * @static
     * @name make
     * @param {string} $view
     * @param {array} $data - all dynamic variables for using in the template engine
     * @return {void}
     */
    public static function make(string $view, array $data = []): void;
}