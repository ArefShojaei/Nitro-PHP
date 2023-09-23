<?php

/**
 * @namespace
 */
namespace Core\Http;


/**
 * @desc Request HTTP
 * @class
 */
final class Request {
    /**
     * @desc route param values
     * @prop
     * @private
     * @type {array}
     * @return {array}
     */
    private $params;



    /**
     * @desc user ip
     * @method
     * @public
     * @name ip
     * @return {string} 
     */
    public function ip(): string {
        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * @desc request url 
     * @method
     * @public
     * @name url
     * @return {string} 
     */
    public function url(): string {
        return $_SERVER['REQUEST_URI'];
    }

    /**
     * @desc request method 
     * @method
     * @public
     * @name method
     * @return {string} 
     */
    public function method(): string {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @desc request protocol 
     * @method
     * @public
     * @name protocol
     * @return {string} 
     */
    public function protocol(): string {
        return $_SERVER['SERVER_PROTOCOL'];
    }

    /**
     * @desc query of request url  
     * @method
     * @public
     * @name query
     * @return {string} 
     */
    public function query(string $key): string {
        return $_GET[$key];
    }

    /**
     * @desc data of request body
     * @method
     * @public
     * @name body
     * @param {string} $key - key name
     * @return {string} 
     */
    public function body(string $key): string {
        $value = json_decode(file_get_contents("php://input"), true);

        return $value ? $value[$key] : $_POST[$key];
    }

    /**
     * @desc request route param
     * @method
     * @public
     * @name param
     * @param {string} $key - key name
     * @return {string} 
     */
    public function param(string $key): string {
        return $this->params[$key];
    }

    /**
     * @desc set route param
     * @method
     * @public
     * @name setParam
     * @param {array} $data - param data
     * @return {void} 
     */
    public function setParam(array $data): void {
        $this->params = $data;
    }

    /**
     * @desc http host
     * @method
     * @public
     * @name host
     * @return {string} 
     */       
    public function host(): string {
        return $_SERVER['HTTP_HOST'];
    }

    /**
     * @desc http user-agent of request
     * @method
     * @public
     * @name userAgent
     * @return {string} 
     */ 
    public function userAgent(): string {
        return $_SERVER['HTTP_USER_AGENT'];
    }

    /**
     * @desc get http header by key
     * @method
     * @public
     * @name header
     * @param {string} $key - key name
     * @return {string} 
     */ 
    public function header(string $key): string {
        return $_SERVER[$key];
    }

    /**
     * @desc get all http headers
     * @method
     * @public
     * @name headers
     * @return {array} 
     */ 
    public function headers(): array {
        return $_SERVER;
    }
}