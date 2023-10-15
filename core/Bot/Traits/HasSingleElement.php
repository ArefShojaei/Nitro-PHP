<?php

namespace Core\Bot\Traits;


trait HasSingleElement {
    /**
     * @desc select an element
     * @method
     * @public
     * @name count
     * @param {string} $selector - DOM selector
     * @return {self}
     */
    public function find(string $xPath): self {
        $this->element = $this->document->query($this->$xPath);

        return $this;
    }

    /**
     * @desc get element attribute by name
     * @method
     * @public
     * @name attr
     * @param {string} $name
     * @return {string}
     */
    public function attr(string $name): string {
        return $this->element[0]->getAttribute($name);
    }

    /**
     * @desc has element attrubute
     * @method
     * @public
     * @name hasAttr
     * @param {string} $name
     * @return {boolean}
     */
    public function hasAttr(string $name): bool {
        return $this->element->hasAttribute($name);
    }
}