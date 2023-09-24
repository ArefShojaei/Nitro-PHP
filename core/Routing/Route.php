<?php

/**
 * @namespace
 */
namespace Core\Routing;

/**
 * @package
 */
use Core\Routing\{
    Router,
    Traits\HasMiddleware
};
use Core\Contracts\Interfaces\Routing\Route as RouteInterface;


/**
 * @desc Route request handler
 * @class
 * @extends Router
 * @implements {RouteInterface}
 */
class Route extends Router implements RouteInterface {
    /**
     * @desc import traits 
     */
    use HasMiddleware;

    /**
     * @desc GET http method
     * @method
     * @public
     * @static
     * @name get
     * @param {stirng} $path
     * @param {callable} $action - callback function for getting response data
     * @return {void}
     */
    public static function get(string $path, callable $action): void {
        parent::addRoute(
            'GET', 
            parent::$prefix . $path, 
            $action, 
            parent::$middlewares
        );
    }

    /**
     * @desc POST http method
     * @method
     * @public
     * @static
     * @name post
     * @param {stirng} $path
     * @param {callable} $action - callback function for getting response data
     * @return {void}
     */
    public static function post(string $path, callable $action): void {
        parent::addRoute(
            'POST', 
            parent::$prefix . $path, 
            $action, 
            parent::$middlewares
        );
    }
    
    /**
     * @desc PUT http method
     * @method
     * @public
     * @static
     * @name put
     * @param {stirng} $path
     * @param {callable} $action - callback function for getting response data
     * @return {void}
     */
    public static function put(string $path, callable $action): void {
        parent::addRoute(
            'PUT', 
            parent::$prefix . $path, 
            $action, 
            parent::$middlewares
        );
    }

    /**
     * @desc PATCH http method
     * @method
     * @public
     * @static
     * @name patch
     * @param {stirng} $path
     * @param {callable} $action - callback function for getting response data
     * @return {void}
     */
    public static function patch(string $path, callable $action): void {
        parent::addRoute(
            'PATCH', 
            parent::$prefix . $path, 
            $action, 
            parent::$middlewares
        );
    }

    /**
     * @desc DELETE http method
     * @method
     * @public
     * @static
     * @name delete
     * @param {stirng} $path
     * @param {callable} $action - callback function for getting response data
     * @return {void}
     */
    public static function delete(string $path, callable $action): void {
        parent::addRoute(
            'DELETE', 
            parent::$prefix . $path, 
            $action, 
            parent::$middlewares
        );
    }

    /**
     * @desc any http methods
     * @method
     * @public
     * @static
     * @name any
     * @param {stirng} $path
     * @param {callable} $action - callback function for getting response data
     * @return {void}
     */
    public static function any(string $path, callable $action): void {
        # get http method
        $method = $_SERVER['REQUEST_METHOD'];

        # default state for the $acceptedMethod
        $acceptedMethod = false;

        foreach(parent::$allowedMethods as $acceptMethod) {
            # match http method with the $allowedMethods
            if($method == $acceptedMethod) {
                # set new state for the $acceptedMethod
                $acceptedMethod = true;

                # stop execution the loop
                break;
            }
        }

        # show custom error for not be success process & stop execution
        if(!$acceptedMethod) {
            throw new \Exception("The {$method} method is not supported!");
        }

        parent::addRoute(
            $method, 
            parent::$prefix . $path, 
            $action, 
            parent::$middlewares
        );
    }

    /**
     * @desc accept specific methods
     * @method
     * @public
     * @static
     * @name match
     * @param {array} $methods
     * @param {string} $path
     * @param {callable} $action - callback function for getting response data
     * @return {void}
     */
    public static function match(array $methods, string $path, callable $action): void {
        # get http method
        $method = $_SERVER['REQUEST_METHOD'];

        # default state for the $acceptedMethod
        $acceptedMethod = NULL;
        
        foreach(parent::$allowedMethods as $key => $acceptMethod) {
            # match http method with the $allowedMethods
            if($method == $methods[$key]) {
                # set the matched http method
                $acceptedMethod = $methods[$key];

                # stop execution the loop
                break;
            }
        }

        parent::addRoute(
            $method, 
            parent::$prefix . $path, 
            $action, 
            parent::$middlewares
        );
    }

    /**
     * @desc group routes
     * @method
     * @public
     * @static
     * @name group
     * @param {string} $path
     * @param {callable} $action - callback function for getting response data
     * @return {void}
     */
    public static function group(string $path, callable $action): void {
        # default base prefix route
        $base_prefix = parent::$prefix;

        # concat child routes to the parent("base prefix") route
        parent::$prefix .= $path;

        # run the action
        $action();

        # set the default the base prefix route again
        parent::$prefix = $base_prefix;
    }
}