<?php

/**
 * @namespace
 */
namespace Core\Contracts\Interfaces;


/**
 * @desc declare contracts for Api http request
 * @interface
 * @name Api
 */
interface Api {
    /**
     * @desc declare the "get" method for the GET http request
     * @method
     * @public
     * @name get
     * @param {string} $endPoint - api end-point
     * @return {object|array}
     */
    public function get(string $endPoint): object|array;
    
    /**
     * @desc declare the "post" method for the POST http request
     * @method
     * @public
     * @name post
     * @param {string} $endPoint - api end-point
     * @param {array} $data
     * @return {object|array}
     */
    public function post(string $endPoint, array $data = []): object|array;
    
    /**
     * @desc declare the "put" method for the PUT http request
     * @method
     * @public
     * @name put
     * @param {string} $endPoint - api end-point
     * @param {array} $data
     * @return {object|array}
     */
    public function put(string $endPoint, array $data = []): object|array;
    
    /**
     * @desc declare the "patch" method for the PATCH http request
     * @method
     * @public
     * @name patch
     * @param {string} $endPoint - api end-point
     * @param {array} $data
     * @return {object|array}
     */
    public function patch(string $endPoint, array $data = []): object|array;
    
    /**
     * @desc declare the "delete" method for the DELETE http request
     * @method
     * @public
     * @name delete
     * @param {string} $endPoint - api end-point
     * @param {array} $data
     * @return {object|array}
     */
    public function delete(string $endPoint, array $data = []): object|array;
}