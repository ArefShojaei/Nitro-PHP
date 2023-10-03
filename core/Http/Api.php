<?php

/**
 * @namespace
 */
namespace Core\Http;

/**
 * @package
 */
use Core\Contracts\Interfaces\Api as ApiInterface;


/**
 * @desc api http request
 * @class
 * @implements {ApiInterface}
 */
class Api implements ApiInterface {
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
     * @desc
     * @method
     * @public
     * @name get
     * @param {string} $endPoint - api end-point
     * @return {object|array}
     */
    public function get(string $endPoint): object|array {
        # set config for url
        curl_setopt($this->curl, CURLOPT_URL, $this->baseURL . $endPoint);
        
        # set config for the return transfer
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);

        # execute process
        return $this->execute();
    }
    
    /**
     * @desc
     * @method
     * @public
     * @name post
     * @param {string} $endPoint - api end-point
     * @param {array} $data
     * @return {object|array}
     */
    public function post(string $endPoint, array $data = []): object|array {
        # url configuration
        curl_setopt($this->curl, CURLOPT_URL, $this->baseURL . $endPoint);
        
        # the return transfer configuration
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        
        # the POST method configuration
        curl_setopt($this->curl, CURLOPT_POST, true);
        
        # the request body data
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, json_encode($data));
        
        # content-type header configuration
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
        
        # set config for the return transfer
        return $this->execute();
    }
    
    /**
     * @desc
     * @method
     * @public
     * @name put
     * @param {string} $endPoint - api end-point
     * @param {array} $data
     * @return {object|array}
     */
    public function put(string $endPoint, array $data = []): object|array {
        # url configuration
        curl_setopt($this->curl, CURLOPT_URL, $this->baseURL . $endPoint);

        # the return transfer configuration
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);

        # custom http method configuration
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, 'PUT');

        # the request body data
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, json_encode($data));

        # content-type header configuration
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);

        # set config for the return transfer
        return $this->execute();
    }
    
    /**
     * @desc
     * @method
     * @public
     * @name patch
     * @param {string} $endPoint - api end-point
     * @param {array} $data
     * @return {object|array}
     */
    public function patch(string $endPoint, array $data = []): object|array {
        # url configuration
        curl_setopt($this->curl, CURLOPT_URL, $this->baseURL . $endPoint);

        # the return transfer configuration
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);

        # custom http method configuration
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, 'PATCH');

        # the request body data
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, json_encode($data));

        # content-type header configuration
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);

        # set config for the return transfer
        return $this->execute();
    }
    
    /**
     * @desc
     * @method
     * @public
     * @name delete
     * @param {string} $endPoint - api end-point
     * @param {array} $data
     * @return {object|array}
     */
    public function delete(string $endPoint, array $data = []): object|array {
        # url configuration
        curl_setopt($this->curl, CURLOPT_URL, $this->baseURL . $endPoint);

        # the return transfer configuration
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);

        # custom http method configuration
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, 'DELETE');

        # the request body data
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, json_encode($data));

        # content-type header configuration
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);

        # set config for the return transfer
        return $this->execute();
    }
}