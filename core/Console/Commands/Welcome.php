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
class Welcome implements CommandInterface {
    /**
     * @desc app version
     * @prop
     * @private
     * @constant {string}
     * @default
     * @return {string}
     */
    private const VERSION = "1.0.0";

    /**
     * @desc author name
     * @prop
     * @private
     * @constant {string}
     * @default
     * @return {string}
     */
    private const AUTHOR = "Aref Shojaei";

    /**
     * @desc author url
     * @prop
     * @private
     * @constant {string}
     * @default
     * @return {string}
     */
    private const AUTHOR_URL = "https://github.com/ArefShojaei";

    /**
     * @desc repository url
     * @prop
     * @private
     * @constant {string}
     * @default
     * @return {string}
     */
    private const REPOSITORY_URL = "https://github.com/ArefShojaei/Nitro-PHP";

    

    /**
     * @desc nitro php console options
     * @prop
     * @private
     * @type {array}
     * @return {array}
     */
    private array $options;

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
        
        # get options data and set to this variable
        $this->options = $loadedConfigData->get("lables")["options"];
        
        # get commands data and set to this variable
        $this->commands = $loadedConfigData->get("lables")["commands"];
    }

    /**
     * @desc show welcome message of the nitro php CMD
     * @method
     * @public
     * @name show
     * @return {void}
     */
    public function show(): void {
        # call the "showTitle" method
        $this->showTitle();
        
        # call the "showInfo" method
        $this->showInfo();
        
        # call the "showOptions" method
        $this->showOptions();

        # call the "showCommands" method
        $this->showCommands();
    }

    /**
     * @desc show commands list
     * @method
     * @private
     * @name showCommands
     * @return {void}
     */
    private function showCommands(): void {
        echo "📌 Commands:\n\n";

        foreach($this->commands as $command => $description) {
            echo "   #️⃣  {$command} \t- {$description}\n";
        }
    }

    /**
     * @desc show console options
     * @method
     * @private
     * @name showOptions
     * @return {void}
     */
    private function showOptions(): void {
        echo "📌 Options:\n\n";

        foreach($this->options as $option) {
            echo " ⚡ {$option}\n";
        }

        echo "\n";
    }

    /**
     * @desc show console info
     * @method
     * @private
     * @name showOptions
     * @return {void}
     */
    private function showInfo(): void {
        echo " 📦 Version : v" . self::VERSION . "\n";
        echo " 👱 Author : " . self::AUTHOR . "\n";
        echo " 🔗 Author URL : " . self::AUTHOR_URL . "\n";
        echo " 🔗 Repository : " . self::REPOSITORY_URL . "\n\n\n";
    }

    /**
     * @desc show welcome message of the nitro php
     * @method
     * @private
     * @name showTitle
     * @return {void}
     */
    private function showTitle(): void {
        echo "
   _   __ _  __                  ____   __  __ ____ 
   / | / /(_)/ /_ _____ ____     / __ \ / / / // __ \
  /  |/ // // __// ___// __ \   / /_/ // /_/ // /_/ /
 / /|  // // /_ / /   / /_/ /  / ____// __  // ____/ 
/_/ |_//_/ \__//_/    \____/  /_/    /_/ /_//_/      
                                                          
        

✩░▒▓▆▅▃▂▁ Awesome CLI ▁▂▃▅▆▓▒░✩\n\n\n";
    }

}