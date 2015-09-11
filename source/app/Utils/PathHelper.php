<?php

namespace App\Utils;
/**
 *
 */
class PathHelper
{
    public static function getRootPath()
    {
        $rootPath  = dirname (dirname (dirname (__DIR__)));
        return $rootPath;
    }

    public static function getPathToUploaded()
    {
        return static::getRootPath() . "/public/uploaded";
    }
}



 ?>
