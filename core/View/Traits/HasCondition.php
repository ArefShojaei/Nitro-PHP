<?php

namespace Core\View\Traits;

trait HasCondition {
    private static function includeIfStatement(): void {
        list($ifRegex, $elseifRegex, $elseRegex, $endifRegex) = self::getIfStatementPattern();

        self::$content = preg_replace_callback($ifRegex, function($matches) {
            return str_replace(["@", ")"],["<? ", "): ?>"], $matches[0]);
        }, self::$content);

        self::$content = preg_replace_callback($elseifRegex, function($matches) {
            return str_replace(["@", ")"],["<? ", "): ?>"], $matches[0]);
        }, self::$content);

        self::$content = preg_replace_callback($elseRegex, function($matches) {
            return str_replace(["@", "se"],["<? ", "se: ?>"], $matches[0]);
        }, self::$content);
        
        self::$content = preg_replace($endifRegex, "<? endif; ?>", self::$content);
    }
}