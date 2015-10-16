<?php

namespace App\Utils;
/**
 *
 */
class PathHelper
{
    private static $publicResourcesPath;

    public static function getRootPath()
    {
        $rootPath  = dirname (dirname (dirname (__DIR__)));
        return $rootPath;
    }

    public static function getPublicResourcesPath() {
        return static::$publicResourcesPath;
    }

    public static function setPublicResourcesPath($newPublicResourcesPath) {
        static::$publicResourcesPath = $newPublicResourcesPath;
    }

    public static function getPathToUploaded()
    {
        return static::getPublicResourcesPath . "/uploaded";
    }
}
