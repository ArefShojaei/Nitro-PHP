<?php

namespace Core\View\Traits;

trait HasRegexPattern {
    private static function getForeachPattern(): array {
        $startRegex = "/@foreach\s*\(.+\)/";
        $endRegex = "/@endforeach/";

        return [$startRegex, $endRegex];
    }

    private static function getDynamicExpressionPattern(): string {
        return "/\{\{[^\!\-\-]\s*(?<expression>.+)\s*[^--]\}\}/";
    }

    private static function getCommentMessagePattern(): string {
        return "/\{\{\!--(?<comment>.+)--\}\}/";
    }

    private static function getIncludePartialPattern(): string {
        return "/@include\([\"\'](?<file>.+)[\"\']\)/";
    }

    private static function getIfStatementPattern(): array {
        $ifRegex = "/@if\s*\(.+\)/";
        $elseifRegex = "/@elseif\s*\(.+\)/";
        $elseRegex = "/@else/";
        $endifRegex = "/@endif/";

        return [$ifRegex, $elseifRegex, $elseRegex, $endifRegex];
    }
}