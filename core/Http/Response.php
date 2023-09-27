<?php

/**
 * @namespace
 */
namespace Core\Http;

/**
 * @package
 */
use Core\{
    View\View,
    Contracts\Interfaces\Response as ResponseInterface
};


/**
 * @desc Response HTTP
 * @class
 */
final class Response implements ResponseInterface {
    /**
     * @desc render view template
     * @method
     * @public
     * @name render
     * @param {string} $view - view name
     * @param {array} $data - all dynamic variables for using in the view
     * @return {void}
     */
    public function render(string $view, array $data = []): void {
        View::make($view, $data);
    }

    /**
     * @desc send JSON data format
     * @method
     * @public
     * @name json
     * @param {array} $data
     * @return {void}
     */
    public function json(array $data): void {
        $this->type("application/json");
        echo json_encode($data);
        exit;
    }

    /**
     * @desc send HTML data format
     * @method
     * @public
     * @name send
     * @param {array} $data
     * @return {void}
     */
    public function send(string $data): void {
        $this->type("text/html");
        echo $data;
        exit;
    }

    /**
     * @desc redirect to another path
     * @method
     * @public
     * @name redirect
     * @param {string} $path - target path
     * @return {void}
     */
    public function redirect(string $path): void {
        header("Location: {$path}", true, 302);
    }

    /**
     * @desc set content-type
     * @method
     * @public
     * @name type
     * @param {string} $mimeType
     * @return {self}
     */
    public function type(string $mimeType): self {
        header("Content-Type: {$mimeType}");

        return $this;
    }
    
    /**
     * @desc set status code
     * @method
     * @public
     * @name status
     * @param {intiger} $code
     * @return {self}
     */
    public function status(int $code): self {
        http_response_code($code);

        return $this;
    }
}