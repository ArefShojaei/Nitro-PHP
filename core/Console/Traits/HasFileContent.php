<?php

namespace Core\Console\Traits;


trait HasFileContent {
    /**
     * @desc addBr as "\n" content
     * @method
     * @private
     * @name addBr
     * @param {integer} $enterCount
     * @return {string}
     */
    private function addBr(int $enterCount): string {
        $content = "";

        for ($index=0; $index < $enterCount ; $index++) { 
            $content .= "\n";
        }

        return $content;
    }

    /**
     * @desc add php tag as "<?php" content
     * @method
     * @private
     * @name addPhpTag
     * @return {string}
     */
    private function addPhpTag(): string {
        return "<?php";
    }
    
    /**
     * @desc add namespace content
     * @method
     * @private
     * @name addNamespace
     * @param {string} $namespaceName
     * @return {string}
     */
    private function addNamespace(string $namespaceName): string {
        return "namespace {$namespaceName};";
    }
    
    /**
     * @desc add the use keyboard content
     * @method
     * @private
     * @name addUse
     * @param {string} $namespaceName
     * @return {string}
     */
    private function addUse(string $namespaceName): string {
        return "use {$namespaceName};";
    }
    
    /**
     * @desc add class content
     * @method
     * @private
     * @name addClass
     * @param {string} $className
     * @return {string}
     */
    private function addClass(string $className): string {
        return "class {$className} {}";
    }
}