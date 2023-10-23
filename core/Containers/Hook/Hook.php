<?php

/**
 * @namespace
 */
namespace Core\Containers\Hook;


/**
 * @desc hook conatiner
 * @class
 */
class Hook {
    /**
     * @desc hooks array
     * @prop
     * @private
     * @type {array}
     * @default
     * @return {array}
     */
    private array $hooks = [];



    /**
     * @desc register hook
     * @method
     * @public
     * @name regsiter
     * @param {string} $name - hook name
     * @param {mixed} $data - hook data
     * @return {void}
     */
    public function regsiter(string $name, mixed $data): void {
        $this->hooks[$name] = $data;
    }

    /**
     * @desc use the hook
     * @method
     * @public
     * @name use
     * @param {string} $name - hook name
     * @param {callback} $action
     * @return {void}
     */
    public function use(string $name, callable $action): void {
        $data = $this->hooks[$name];

        $action($data);
    }
}