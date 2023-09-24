<?php

namespace Core\Routing\Traits;


trait HasMiddleware {
    /**
     * @desc before send request to the http method, middleware http handler can be good for handling anything   
     * @method
     * @public
     * @static
     * @name middleware
     * @param {array} $middlewares
     * @return {self}
     */
    public static function middleware(array $middlewares): self {
        parent::$middlewares = $middlewares;

        return new self;
    }
}