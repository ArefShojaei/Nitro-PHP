<?php

/**
 * @namespace
 */
namespace Core\Bot;


/**
 * @package
 */
use Core\Bot\Traits\{ HasSingleElement, HasMultiElement };


/**
 * @desc crawler bot for the DOM
 * @class 
 */
class Crawler {
    /**
     * @desc import traits
     */
    use HasSingleElement, HasMultiElement;


    /**
     * @desc DOM element object
     * @prop
     * @private
     * @type {object}
     * @return {object}
     */
    private object $document;

    /**
     * @desc specific "an element" that selected as DOM object
     * @prop
     * @private
     * @type {object}
     * @return {object}
     */
    private object $element;

    /**
     * @desc specific "all elements" that selected as DOM object
     * @prop
     * @private
     * @type {object}
     * @return {object}
     */
    private object $elements;



    /**
     * @constructor
     * @param {string} $url - website url
     */
    public function __construct(string $url) {
        # get HTML content
        $html = @file_get_contents($url);

        # parse the HTML content
        $dom = $this->parse($html);

        # access to elements by "xPath"
        $this->document = new \DOMXPath($dom);
    }

    /**
     * @desc prase HTML content
     * @method
     * @private
     * @name parse
     * @param {string} $html
     * @return {object}
     */
    private function parse(string $html): object {
        # get new instance of the "Dom Document"
        $dom = new \DOMDocument();

        # load HTML content for handling processes
        @$dom->loadHTML($html);

        # return the DOM object
        return $dom;
    }
}
