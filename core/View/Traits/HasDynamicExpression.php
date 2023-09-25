<?php

namespace Core\View\Traits;

trait HasDynamicExpression {
    private static function includeExpression(): void {
        $regex = self::getDynamicExpressionPattern();

        self::$content = preg_replace_callback($regex, function($matches) {
            return str_replace(["{{", "}}"], ["<?php echo", "?>"], $matches[0]);
        }, self::$content);
    }
}