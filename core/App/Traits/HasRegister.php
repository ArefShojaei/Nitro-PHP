<?php

/**
 * @namespace
 */
namespace Core\App\Traits;


trait HasRegsiter {
    private function regsiterRoutes() {
        // $this->web = require_once "routes/web.php";
        // $this->api = require_once "routes/api.php";
    }

    private function regsiterProviders() {
        $this->regsiterWebHooks();
        $this->regsiterApiHooks();
    }

    private function regsiterWebHooks() {}
    
    private function regsiterApiHooks() {}
}