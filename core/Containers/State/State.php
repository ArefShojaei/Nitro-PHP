<?php

/**
 * @namespace
 */
namespace Core\Containers\State;

/**
 * @desc State container
 * @class
 */
class State {
    /**
     * @desc states list
     * @prop
     * @private
     * @type {array}
     * @default
     * @return {array}
     */
    private array $states = [];

    
    /**
     * @desc set state
     * @method
     * @public
     * @name setState
     * @param {mixed} $data
     * @return {void}
     */
    public function setState(mixed $data): void {
        array_push($this->states, $data);
    }

    /**
     * @desc get state
     * @method
     * @public
     * @name getState
     * @return {array}
     */    
    public function getState(): array {
        return $this->states;
    }
}