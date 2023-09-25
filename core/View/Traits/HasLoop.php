<?php

namespace Core\View\Traits;

trait HasLoop {
    private static function includeForeach(): void {
        list($startRegex, $endRegex) = self::getForeachPattern();

        self::$content = preg_replace_callback($startRegex, function($matches) {
            return str_replace(["@", ")"],["<?php ", "): ?>"], $matches[0]);
        }, self::$content);
        
        self::$content = preg_replace($endRegex, "<?php endforeach; ?>", self::$content);
    }
}