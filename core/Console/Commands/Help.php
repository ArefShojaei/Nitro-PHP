<?php

/**
 * @namespace
 */
namespace Core\Console\Commands;

/**
 * @package
 */
use Core\{
    Utils\Config,
    Contracts\Interfaces\Command as CommandInterface
};


/**
 * @desc env command
 * @class
 * @implements {CommandInterface}
 */
class Help implements CommandInterface {
    /**
     * @desc commands list
     * @prop
     * @private
     * @type {array}
     * @return {array}
     */
    private array $commands;



    /**
     * @constructor
     */
    public function __construct() {
        # get console config data
        $loadedConfigData =  Config::find("console");
        
        # get commands data and set to this variable
        $this->commands = $loadedConfigData->get("lables")["commands"];
    }

    /**
     * @desc show help commands
     * @method
     * @public
     * @name show
     * @return {void}
     */
    public function show(): void {
        echo "📌 Commands:\n\n";

        foreach($this->commands as $command => $description) {
            echo "   #️⃣  {$command} \t- {$description}\n";
        }
    }
}