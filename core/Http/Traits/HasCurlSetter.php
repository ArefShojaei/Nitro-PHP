<?php

/**
 * @namespace
 */
namespace Core\Http\Traits;


trait HasCurlSetter {
    /**
     * @desc set curl base options
     * @method
     * @private
     * @name setBaseOptions
     * @return {void}
     */
    private function setBaseOptions($endPoint): void {
        # set config for url
        curl_setopt($this->curl, CURLOPT_URL, $this->baseURL . $endPoint);
        
        # set config for the return transfer
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
    }

    /**
     * @desc set curl header
     * @method
     * @private
     * @name setHeader
     * @return {void}
     */
    private function setHeader(): void {
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
    }
    
    /**
     * @desc set curl the request body data
     * @method
     * @private
     * @name setBody
     * @param {array} $data
     * @return {void}
     */
    private function setBody(array $data): void {
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, json_encode($data));
    }
    
    /**
     * @desc set curl http method
     * @method
     * @private
     * @name setMethod
     * @param {string} $method - http request method
     * @return {void}
     */
    private function setMethod(string $method): void {
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, strtoupper($method));
    }
}