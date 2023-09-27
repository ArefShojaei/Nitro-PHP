<?php

/**
 * @namespace
 */
namespace Core\Console\Commands;

/**
 * @package
 */
use Core\{
    Utils\Env as EnvUtil,
    Contracts\Interfaces\Command as CommandInterface
};


/**
 * @desc env command
 * @class
 * @implements {CommandInterface}
 */
class Env implements CommandInterface {
    public function show(): void {
        # get all variables from the ".env"
        $variables = EnvUtil::all();

        echo "-------------------------\n";
        echo "| KEY        Value      |\n";
        echo "-------------------------\n";
        foreach($variables as $key => $value) {
            # trim the value
            $value = trim($value);

            # is empty value
            $value = empty($value) ? "NULL" : $value;
            
            # show dynamic content
            echo "* {$key} - {$value}\n";
        }
    }
}