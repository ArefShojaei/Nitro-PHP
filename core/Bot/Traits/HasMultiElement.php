<?php

/**
 * @namespace
 */
namespace Core\Bot\Traits;


trait HasMultiElement {
    /**
     * @desc select all elements
     * @method
     * @public
     * @name findAll
     * @param {string} $selectro - DOM selector
     * @return {self}
     */
    public function findAll(string $xPath): self {
        $this->elements = $this->document->query($this->$xPath);

        return $this;
    }

    /**
     * @desc all elements count that selected
     * @method
     * @public
     * @name count
     * @return {integer}
     */
    public function count(): int {
        return count($this->elements);
    }
}