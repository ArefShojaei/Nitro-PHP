<?php

/**
 * @namespace
 */
namespace Core\Contracts\Interfaces\Http;


/**
 * @desc declare contracts for Response http
 * @interface
 * @name Response
 */
interface Response {
    /**
     * @desc declare the "render" method for rendering view template
     * @method
     * @public
     * @name render
     * @param {string} $view - view name
     * @param {array} $data - all dynamic variables for using in the view
     * @return {void}
     */
    public function render(string $view, array $data = []): void;

        /**
     * @desc declare the "json" method for sending json data
     * @method
     * @public
     * @name json
     * @param {array} $data
     * @return {void}
     */
    public function json(array $data): void;

    /**
     * @desc declare the "send" method for sending HTML data
     * @method
     * @public
     * @name send
     * @param {array} $data
     * @return {void}
     */
    public function send(string $data): void;

    /**
     * @desc declare the "redirect" method for moving to another path
     * @method
     * @public
     * @name redirect
     * @param {string} $path - target path
     * @return {void}
     */
    public function redirect(string $path): void;

    /**
     * @desc declare the "type" method for to set content-type
     * @method
     * @public
     * @name type
     * @param {string} $mimeType
     * @return {self}
     */
    public function type(string $mimeType): self;
    
    /**
     * @desc declare the "status" method for to set status code
     * @method
     * @public
     * @name status
     * @param {intiger} $code
     * @return {self}
     */
    public function status(int $code): self;
}