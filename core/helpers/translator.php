<?php

/**
 * @desc translate words
 * @function __
 * @param {string} $keyword - keyword for translating
 * @example __("public.welcome") # 'Welcome dear'
 * @param {array} $params - array for replacing value params in the word
 * @example __("public.welcome", ["name" => "Robert"]) # 'Welcome dear Robert'
 * @return {string}  
 */
function __(string $keyword, array $attributes = []): string {
    list($filename, $key) = explode(".", $keyword);
    
    $file = "resources/langs/fa/{$filename}.php";

    $langAttributes = include $file;

    $content = $langAttributes[$key];

    if(!count($attributes)) {
        return $content;
    }

    return preg_replace_callback("/\{(?<attribute>\w+)\}/", function($matches) use ($attributes) {
        $key = $matches["attribute"];

        return $attributes[$key];
    }, $content);
}