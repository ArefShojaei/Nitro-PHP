<?php

/**
 * @namespace
 */
namespace Core\Http;

/**
 * @package
 */
use Core\{
    Http\Traits\HasCurlSetter,
    Contracts\Interfaces\Api as ApiInterface
};


/**
 * @desc api http request
 * @class
 * @implements {ApiInterface}
 */
class Api implements ApiInterface {
    /**
     * @desc import traits
     */
    use HasCurlSetter;


    /**
     * @desc base api url
     * @prop
     * @private
     * @type {string}
     * @return {string}
     */
    private string $baseURL;
    
    /**
     * @desc curl object
     * @prop
     * @private
     * @type {object}
     * @return {object}
     */
    private object|array $curl;



    /**
     * @constructor
     * @param {string} $baseURL - base api url
     */
    public function __construct(string $baseURL) {
        $this->curl = curl_init();
        $this->baseURL = $baseURL;
    }

    /**
     * @desc execute curl process
     * @method
     * @private
     * @name execute
     * @return {object|array}
     */
    private function execute(): object|array {
        # execute the curl process
        $response = curl_exec($this->curl);

        # close the curl process
        curl_close($this->curl);
        
        # decode api payload data
        return json_decode($response);
    }

    /**
     * @desc curl the GET http request
     * @method
     * @public
     * @name get
     * @param {string} $endPoint - api end-point
     * @return {object|array}
     */
    public function get(string $endPoint): object|array {
        # base options
        $this->setBaseOptions($endPoint);

        # custom http method configuration
        $this->setMethod("GET");

        # execute process
        return $this->execute();
    }
    
    /**
     * @desc curl the POST http request
     * @method
     * @public
     * @name post
     * @param {string} $endPoint - api end-point
     * @param {array} $data
     * @return {object|array}
     */
    public function post(string $endPoint, array $data = []): object|array {
        # base options
        $this->setBaseOptions($endPoint);

        # custom http method configuration
        $this->setMethod("POST");
        
        # the request body data
        $this->setBody($data);
        
        # content-type header configuration
        $this->setHeader();
        
        # set config for the return transfer
        return $this->execute();
    }
    
    /**
     * @desc curl the PUT http request
     * @method
     * @public
     * @name put
     * @param {string} $endPoint - api end-point
     * @param {array} $data
     * @return {object|array}
     */
    public function put(string $endPoint, array $data = []): object|array {
        # base options
        $this->setBaseOptions($endPoint);

        # custom http method configuration
        $this->setMethod("PUT");
        
        # the request body data
        $this->setBody($data);
        
        # content-type header configuration
        $this->setHeader();

        # set config for the return transfer
        return $this->execute();
    }
    
    /**
     * @desc curl the PATCH http request
     * @method
     * @public
     * @name patch
     * @param {string} $endPoint - api end-point
     * @param {array} $data
     * @return {object|array}
     */
    public function patch(string $endPoint, array $data = []): object|array {
        # base options
        $this->setBaseOptions($endPoint);

        # custom http method configuration
        $this->setMethod("PATCH");
        
        # the request body data
        $this->setBody($data);
        
        # content-type header configuration
        $this->setHeader();

        # set config for the return transfer
        return $this->execute();
    }
    
    /**
     * @desc curl the DELETE http request
     * @method
     * @public
     * @name delete
     * @param {string} $endPoint - api end-point
     * @param {array} $data
     * @return {object|array}
     */
    public function delete(string $endPoint, array $data = []): object|array {
        # base options
        $this->setBaseOptions($endPoint);

        # custom http method configuration
        $this->setMethod("DELETE");
        
        # the request body data
        $this->setBody($data);
        
        # content-type header configuration
        $this->setHeader();

        # set config for the return transfer
        return $this->execute();
    }
}