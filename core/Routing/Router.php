<?php

/**
 * @namespace
 */
namespace Core\Routing;

/**
 * @package
 */
use Core\Http\{ Request, Response };
use Core\Routing\Traits\{ HasParam, HasExecute };
use Core\Contracts\Interfaces\Router as RouterInterface;

/**
 * @desc Router system
 * @class
 * @implements {RouterInterface}
 */
class Router implements RouterInterface {
    /**
     * @desc import traits
     */
    use HasParam, HasExecute;

    /**
     * @desc Router instance
     * @prop
     * @private
     * @static
     * @type {object}
     * @return {object}
     */
    private static $instance;

    /**
     * @desc prefix for group routes 
     * @prop
     * @protected
     * @static
     * @type {string}
     * @default
     * @return {string}
     */
    protected static string $prefix = '';

    /**
     * @desc allowed http methods 
     * @prop
     * @protected
     * @static
     * @type {array}
     * @default
     * @return {array}
     */
    protected static array $allowedMethods = ["GET", "POST", "PUT", "PATCH", "DELETE"];

    /**
     * @desc list of middlewares
     * @prop
     * @protected
     * @static
     * @type {array}
     * @default
     * @return {array}
     */
    protected static array $middlewares = [];

    /**
     * @desc list of routes
     * @prop
     * @protected
     * @static
     * @type {array}
     * @default
     * @return {array}
     */
    private static array $routes = [];

    /**
     * @desc list of route params
     * @prop
     * @protected
     * @static
     * @type {array}
     * @default
     * @return {array}
     */
    private static array $params = [];

    

    /**
     * @constructor
     * @private
     * @param {object} $request - HTTP request
     * @param {object} $response - HTTP response
     */
    private function __construct(object $request, object $response) {
        # extract url
        $parsedURL = parse_url($_SERVER['REQUEST_URI']);

        # get path value of the parsed url
        $url = $parsedURL['path'];

        # get request method
        $method = $_SERVER['REQUEST_METHOD'];
        
        # call the fundRoute method 
        self::findRoute($url, $method, [$request, $response]);
    }
    
    /**
     * @desc getInstance Router class
     * @method
     * @public
     * @static
     * @name getInstance
     * @param {Request} $request - HTTP request
     * @param {Response} $response - HTTP response
     * @return {object}
     */
    public static function getInstance(Request $request, Response $response): object {
        if(!self::$instance) {
            self::$instance = new self($request, $response);
        }

        return self::$instance;
    }
    
    /**
     * @desc getInstance Router class
     * @method
     * @private
     * @static
     * @name findRoute
     * @param {string} $url - request url
     * @param {string} $method - request method
     * @return {void}
     */
    private static function findRoute(string $url, string $method, array $params): void {
        foreach(self::$routes[$method] as $route => $options) {
            # matched route
            $matches = self::buildPattern($route, $url);

            # identify the route
            if(count($matches)) {
                # get action of the route
                $action = $options["action"];

                # get middlewares of the route
                $middlewares = $options["middlewares"];

                # extract http request & response objects as a variable
                list($request, $response) = $params;
                
                # call the "extractParams" method 
                self::extractParams($matches);

                # set the route params to the request params property
                $request->setParam(self::$params);

                # call the "executeMiddleware" method
                self::executeMiddleware($middlewares, [$request, $response, fn() => true]);
                
                # call the "executeRoute" method
                self::executeRoute($action, [$request, $response]);
                
                # exit of the processes
                exit;
            }
        }

        # set "404" => http status code 
        header("HTTP/1.1 404 Not Found");

        # show message and exit of the processes
        die("Page not found");
    }
    
    /**
     * @desc build regex pattern for getting route param values 
     * @method
     * @private
     * @static
     * @name buildPattern
     * @param {string} $route - request route
     * @param {string} $url - request url
     * @return {array}
     */
    private static function buildPattern(string $route, string $url): array {
        $pattern = "/^". str_replace(["/", "{", "}"], ["\/", "(?<", ">\w+)"], $route) ."$/";
          
        # first match pattern
        preg_match($pattern, $url, $matches);

        # return matched values
        return $matches;
    }

    /**
     * @desc add route to routes array
     * @method
     * @protected
     * @static
     * @name addRoute
     * @param {string} $method - request method
     * @param {string} $url - request route
     * @param {callable} $action - callback function for getting response data
     * @param {array} $middlewares - before send request, the middlewares starts for handling http request & response handlers
     * @return {void}
     */
    protected static function addRoute(string $method, string $path, callable $action, array $middlewares): void {
        self::$routes[$method][$path] = ["action" => $action, "middlewares" => $middlewares];
    }
}