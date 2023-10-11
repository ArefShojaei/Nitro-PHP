<?php

/**
 * @namespace
 */
namespace Core\Containers\Event;

/**
 * @desc Event container
 * @class
 */
class Event {
    /**
     * @desc events list
     * @prop
     * @private
     * @type {array}
     * @default
     * @return {array}
     */
    private array $events = [];


    /**
     * @desc add event
     * @method
     * @public
     * @name on
     * @param {string} $event - event name
     * @param {callable} $action - event action
     * @return {void}
     */
    public function on(string $event, callable $action): void {
        $this->events[$event] = $action;
    }

    /**
     * @desc dispatch event
     * @method
     * @public
     * @name dispatch
     * @param {string} $event - event name
     * @param {mixed} $data - event data
     * @return {void}
     */
    public function dispatch(string $event, mixed $data): void {
        $action = $this->events[$event];

        $action($data);
    }
}