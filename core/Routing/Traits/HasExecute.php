<?php

namespace Core\Routing\Traits;


trait HasExecute {
    /**
     * @desc execute the matched route
     * @method
     * @private
     * @static
     * @name executeRoute
     * @param {callable} $action - callback function for getting response data
     * @param {array} $params - HTTP request & response objects
     * @return {void}
     */
    private static function executeRoute(callable $action, array $params): void {
        # extract http object
        list($req, $res) = $params;

        # run the action
        $action($req, $res);
    }
    
    /**
     * @desc execute middlewares of the matched route
     * @method
     * @private
     * @static
     * @name executeMiddleware
     * @param {callable} $action - callback function for getting response data
     * @param {array} $params - HTTP request & response objects + next function for running the next middleware
     * @return {void}
     */
    private static function executeMiddleware(array $middlewares, array $params): void {
        # extract http object + next function
        list($req, $res, $next) = $params;

        # middleware base folder path
        $base_path = "app\\Http\\Middlewares\\";

        foreach($middlewares as $middleware) {
            # use namespace for calling the class object
            $class = $base_path . ucfirst(trim($middleware));
        
            # get a new instance of the class and call the handle method and pass args
            (new $class)->handle($req, $res, $next);
        }
    }
}