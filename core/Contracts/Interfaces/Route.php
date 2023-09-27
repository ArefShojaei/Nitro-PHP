<?php

/**
 * @namespace
 */
namespace Core\Contracts\Interfaces;


/**
 * @desc declare contracts for Route request handler
 * @interface
 * @name Route
 */
interface Route {
    /**
     * @desc declare the "get" method for using GET http request
     * @method
     * @public
     * @static
     * @name get
     * @param {string} $path
     * @param {callable} $action - callback function for getting response data
     * @return {void}
     */
    public static function get(string $path, callable $action): void;

    /**
     * @desc declare the "post" method for using POST http request
     * @method
     * @public
     * @static
     * @name post
     * @param {string} $path
     * @param {callable} $action - callback function for getting response data
     * @return {void}
     */
    public static function post(string $path, callable $action): void;
    
    /**
     * @desc declare the "put" method for using PUT http request
     * @method
     * @public
     * @static
     * @name put
     * @param {string} $path
     * @param {callable} $action - callback function for getting response data
     * @return {void}
     */
    public static function put(string $path, callable $action): void;

    /**
     * @desc declare the "patch" method for using PATCH http request
     * @method
     * @public
     * @static
     * @name patch
     * @param {string} $path
     * @param {callable} $action - callback function for getting response data
     * @return {void}
     */
    public static function patch(string $path, callable $action): void;

    /**
     * @desc declare the "delete" method for using DELETE http request
     * @method
     * @public
     * @static
     * @name delete
     * @param {string} $path
     * @param {callable} $action - callback function for getting response data
     * @return {void}
     */
    public static function delete(string $path, callable $action): void;

    /**
     * @desc declare the "any" method for using any http requests
     * @method
     * @public
     * @static
     * @name any
     * @param {string} $path
     * @param {callable} $action - callback function for getting response data
     * @return {void}
     */
    public static function any(string $path, callable $action): void;

    /**
     * @desc declare the "match" method for accepting specific methods
     * @method
     * @public
     * @static
     * @name match
     * @param {array} $methods
     * @param {string} $path
     * @param {callable} $action - callback function for getting response data
     * @return {void}
     */
    public static function match(array $methods, string $path, callable $action): void;

    /**
     * @desc declare the "group" method for using group routes
     * @method
     * @public
     * @static
     * @name group
     * @param {string} $path
     * @param {callable} $action - callback function for getting response data
     * @return {void}
     */
    public static function group(string $path, callable $action): void;

    /**
     * @desc declare the "middleware" method for using middleware in http requests
     * @method
     * @public
     * @static
     * @name middleware
     * @param {array} $middlewares
     * @return {self}
     */
    public static function middleware(array $middlewares): self;
}