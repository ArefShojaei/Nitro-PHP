<?php

/**
 * @desc get resources path
 * @function resourcesPath
 * @param {string} $filePath
 * @return {string} 
 */
function resourcesPath($filePath = ''): string {
    return "resources/" . ltrim($filePath, "/");
}