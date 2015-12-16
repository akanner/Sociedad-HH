<?php
namespace App\Validations;
/**
 * basic validation functions
 */
class BasicValidations
{

    private static $instance;

    private function __construct() {}

    public static function getInstance() {
        if (!static::$instance instanceof self) {
            static::$instance = new self;
        }

        return static::$instance;
    }



    public function validateRequiredField($object,$field)
    {
        $isset = isset($object->$field);
        if($isset)
        {
            return !empty($object->$field);
        }
        else
        {
            return FALSE;
        }
    }
}


 ?>
