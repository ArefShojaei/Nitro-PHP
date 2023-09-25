<?php

/**
 * @namespace
 */
namespace Core\Contracts\Interfaces\Http;


/**
 * @desc declare contracts for Request http
 * @interface
 * @name Request
 */
interface Request {
    /**
     * @desc declare the "ip" method for getting user-ip
     * @method
     * @public
     * @name ip
     * @return {string} 
     */
    public function ip(): string;

    /**
     * @desc declare the "url" method for getting request url 
     * @method
     * @public
     * @name url
     * @return {string} 
     */
    public function url(): string;

    /**
     * @desc declare the "method" method for getting request method 
     * @method
     * @public
     * @name method
     * @return {string} 
     */
    public function method(): string;

    /**
     * @desc declare the "protocol" method for getting request protocol 
     * @method
     * @public
     * @name protocol
     * @return {string} 
     */
    public function protocol(): string;

    /**
     * @desc declare the "query" method for getting query of request url  
     * @method
     * @public
     * @name query
     * @return {string} 
     */
    public function query(string $key): string;

    /**
     * @desc declare the "body" method for getting data of request body
     * @method
     * @public
     * @name body
     * @param {string} $key - key name
     * @return {string} 
     */
    public function body(string $key): string;

    /**
     * @desc declare the "param" method for getting request route param
     * @method
     * @public
     * @name param
     * @param {string} $key - key name
     * @return {string} 
     */
    public function param(string $key): string;

    /**
     * @desc declare the "setParam" method for getting set route param
     * @method
     * @public
     * @name setParam
     * @param {array} $data - param data
     * @return {void} 
     */
    public function setParam(array $data): void;

    /**
     * @desc declare the "host" method for getting http host
     * @method
     * @public
     * @name host
     * @return {string} 
     */       
    public function host(): string;

    /**
     * @desc declare the "userAgent" method for getting http user-agent of request
     * @method
     * @public
     * @name userAgent
     * @return {string} 
     */ 
    public function userAgent(): string;

    /**
     * @desc declare the "header" method for getting http header by key
     * @method
     * @public
     * @name header
     * @param {string} $key - key name
     * @return {string} 
     */ 
    public function header(string $key): string;

    /**
     * @desc declare the "headers" method for getting all http headers
     * @method
     * @public
     * @name headers
     * @return {array} 
     */ 
    public function headers(): array;
}