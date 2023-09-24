<?php

/**
 * @namespace
 */
namespace Core\Contracts\Interfaces\Routing;

/**
 * @package
 */
use Core\Http\{ Request, Response };


/**
 * @desc declare contracts for the Router system
 * @interface
 * @name Router
 */
interface Router {
    /**
     * @desc declare the "getInstance" method for getting a instance of the class
     * @method
     * @public
     * @static
     * @name getInstance
     * @param {Request} $request - http request
     * @param {Response} $response - http response
     * @return {object}
     */
    public static function getInstance(Request $request, Response $response): object;
}