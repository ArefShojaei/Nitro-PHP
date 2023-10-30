<?php

/**
 * @desc add action hook
 * @method
 * @name addHook
 * @param {string} $name - hook name
 * @return {void}
 */
function addHook(string $name): void {
    $GLOBALS["container"]["hook"]["actions"][] = $name;
}


/**
 * @desc use the action hook
 * @method
 * @name useHook
 * @param {string} $name - hook name
 * @param {callback} $handler - hook function handler
 * @return {void}
 */
function useHook(string $name, callable $handler): void {
    foreach($$GLOBALS["container"]["hook"]["actions"] as $action) {
        if($name === $action) {
            $handler();
            exit;
        }
    }
}

/**
 * @desc add filter hook
 * @method
 * @name addFilterHook
 * @param {string} $name - hook name
 * @param {mxied} $name - hook init value
 * @return {void}
 */
function addFilterHook(string $name, mixed $initValue): void {
    $GLOBALS["container"]["hook"]["filters"][] = $value;
}


/**
 * @desc use the filter hook
 * @method
 * @name applyHook
 * @param {string} $name - hook name
 * @param {callback} $handler - hook function handler
 * @return {mixed}
 */
function applyHook(string $name, callable $handler): mixed {
    $value = $GLOBALS["container"]["hook"]["filters"][$name];

    return $handler($data);
}