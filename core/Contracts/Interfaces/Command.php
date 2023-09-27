<?php

/**
 * @namespace
 */
namespace Core\Contracts\Interfaces;


/**
 * @desc declare contracts for the Command
 * @interface
 * @name Command
 */
interface Command {
    /**
     * @desc declare the "show" method for showing a command content
     * @method
     * @public
     * @name show
     * @return {void}
     */
    public function show(): void;
}