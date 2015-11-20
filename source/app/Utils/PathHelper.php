<?php

namespace App\Utils;

class PathHelper {

    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     *
     * @return Singleton The *Singleton* instance.
     */
    public static function getInstance() {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    protected function __construct() {}

    public function getRootPath() {
        return base_path();
    }

    public function getPublicResourcesPath() {
        return public_path();
    }

    public function getPathToUploaded() {
        return $this->getPublicResourcesPath() . "/uploaded";
    }

}
