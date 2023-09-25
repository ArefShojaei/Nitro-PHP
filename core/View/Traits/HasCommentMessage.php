<?php

namespace Core\View\Traits;


trait HasCommentMessage {
    private static function includeComment(): void {
        $regex = self::getCommentMessagePattern();

        self::$content = preg_replace($regex, '', self::$content);
    }
}