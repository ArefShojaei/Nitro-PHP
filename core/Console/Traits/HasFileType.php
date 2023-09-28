<?php

/**
 * @namespace
 */
namespace Core\Console\Traits;


trait HasFileType {
    /**
     * @desc controller file content
     * @method
     * @private
     * @name controller
     * @param {string} $filename
     * @return {string}
     */
    private function controller(string $filename): string {
        $this->fileContent .= $this->addPhpTag() . $this->addBr(2);
        $this->fileContent .= $this->addNamespace("App\Http\Controllers") . $this->addBr(2);
        $this->fileContent .= $this->addUse("Core\Http\{ Request, Response }") . $this->addBr(3);
        $this->fileContent .= $this->addClass($filename);
        
        return $this->fileContent;
    }

    /**
     * @desc middleware file content
     * @method
     * @private
     * @name controller
     * @param {string} $filename
     * @return {string}
     */
    private function middleware($filename): string {
        $this->fileContent .= $this->addPhpTag() . $this->addBr(2);
        $this->fileContent .= $this->addNamespace("App\Http\Middlewares") . $this->addBr(2);
        $this->fileContent .= $this->addUse("Core\Http\{ Request, Response }") . $this->addBr(3);
        $this->fileContent .= $this->addClass($filename);
        
        return $this->fileContent;
    }

    /**
     * @desc service file content
     * @method
     * @private
     * @name controller
     * @param {string} $filename
     * @return {string}
     */
    private function service($filename): string {
        $this->fileContent .= $this->addPhpTag() . $this->addBr(2);
        $this->fileContent .= $this->addNamespace("App\Http\Services") . $this->addBr(3);
        $this->fileContent .= $this->addClass($filename);
        
        return $this->fileContent;
    }

    /**
     * @desc model file content
     * @method
     * @private
     * @name controller
     * @param {string} $filename
     * @return {string}
     */
    private function model($filename): string {}
}