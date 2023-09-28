<?php

/**
 * @namespace
 */
namespace Core\Console\Commands;

/**
 * @package
 */
use Core\Contracts\Interfaces\Command as CommandInterface;
use Core\Console\Traits\{
    HasFileContent,
    HasFileType
};


/**
 * @desc make command
 * @class
 * @implements {CommandInterface}
 */
class Make implements CommandInterface {
    /**
     * @desc import traits
     */
    use HasFileContent, HasFileType;


    /**
     * @desc
     * @prop
     * @private
     * @constant {array}
     * @default
     * @return {array}
     */
    private const TYPES = [
        "controller" => "app/Http/Controllers/",
        "middleware" => "app/Http/Middlewares/",
        "service" => "app/Services/",
        "model" => "app/Models/",
    ];


    /**
     * @desc a make type of the "TYPES" array
     * @prop
     * @private
     * @type {string}
     * @return {string}
     */
    private string $type;

    /**
     * @desc filename of the make type command
     * @prop
     * @private
     * @type {string}
     * @return {string}
     */
    private string $filename;

    /**
     * @desc filecontent of the make type command
     * @prop
     * @private
     * @type {string}
     * @default
     * @return {string}
     */
    private string $fileContent = "";


    /**
     * @constructor
     * @param {array} $params
     */
    public function __construct(array $params) {
        # extract args
        list($type, $filename) = $params;

        # define values to properties
        $this->type = lcfirst($type);
        $this->filename = ucfirst($filename);
    }

    /**
     * @desc show the make command type content
     * @method
     * @public
     * @name show
     * @return {void}
     */
    public function show(): void {
        foreach(self::TYPES as $type => $path) {
            if($this->type == $type) {
                # file content
                $content = $this->$type($this->filename);
                
                # file path
                $filePath = $path . $this->filename . ".php";

                # put the content to the path as a file
                file_put_contents($filePath, $content);

                # show message for successful process
                echo "{$type} file was created successfully.";

                # stop execution
                exit;
            }
            
        }

        # throw an error exception
        throw new \Exception("The \"{$this->type}\" type doesn't exists!");
    }
}