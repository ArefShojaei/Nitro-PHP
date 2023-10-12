<?php

/**
 * @namespace
 */
namespace Core\App\Traits;


trait HasRegister {
    /**
     * @desc register IOC containers
     * @method
     * @public
     * @name registerContainers
     * @param {object} $app
     * @return {void}
     */
    public function registerContainers($app): void {
        $app->resolve("Logger");
        $app->resolve("Router");
    }

    /**
     * @desc register routes (web & api)
     * @method
     * @private
     * @name registerRoutes
     * @return {void}
     */
    private function registerRoutes(): void {
        require_once "routes/web.php";
        require_once "routes/api.php";
    }
}