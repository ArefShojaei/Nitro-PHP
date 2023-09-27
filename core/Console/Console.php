<?php

/**
 * @namespace
 */
namespace Core\Console;


/**
 * @desc Command Line Interface
 * @class
 */
class Console {
    /**
     * @desc welcome command key
     * @prop
     * @private
     * @constant {integer}
     * @default
     * @return {integer}
     */
    private const WELCOME_COMMAND = 1;


    /**
     * @constructor
     * @param {array} $params - command data
     */
    public function __construct(array $params) {
        # get commands count
        $commands_length = count($params);

        # get first command
        $command = isset($params[1]) ? $params[1] : false;


        # run Welcome message
        if($commands_length == self::WELCOME_COMMAND) {
            # get the welcome class with 'namespace'
            $class = "core\\Console\\Commands\\Welcome";
        
            # get instance of the class and call the "show" method
            (new $class())->show();

            # stop execution
            exit;
        }

        # remove first command of the $params array like 'php {nitro}' 
        unset($params[0]);

        # remove second command of the $params array 
        # example :
        #          php nitro
        #          php nitro {env}
        #          php nitro {serve}
        unset($params[1]);

        # new commands array
        $commandsArray = array_values($params);

        # dispatch the command + params
        $this->dispatch($command, $commandsArray);
    }


    /**
     * @desc
     * @method
     * @name dispatch
     * @private
     * @param {string} $command 
     * @param {array} $params
     * @return {void}
     */
    private function dispatch(string $command, array $params): void {
        # trim and upper case first the command to a class 
        $className =  ucfirst(ltrim($command, "--"));
        
        # get the class by namespace
        $class = "core\\Console\\Commands\\" . $className;

        # check for existsing the class
        if(!class_exists($class)) {
            throw new \Exception("The command not found!");
        }

        # check for existsing method of the class
        if(!method_exists($class, "show")) {
            throw new \Exception("The 'show' method doesn't exist!");
        }

        # get instance of the class and call the method
        (new $class($params))->show();

        # stop execution
        exit;
    }
}