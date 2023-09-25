<?php

namespace Core\View\Traits;

trait HasIncludeContent {
    private static function includePartial(): void {
        $regex = self::getIncludePartialPattern();

        self::$content = preg_replace_callback($regex, function($matches) {
            $fileRoot = $matches['file'];

            $filePath = self::BASE_PATH . $fileRoot . self::FILE_EXTENTION;

            return file_get_contents($filePath);
        }, self::$content);
    }
}