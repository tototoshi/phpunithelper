<?php
namespace PHPUnitHelper\Reflector;

use phpDocumentor\Reflection\ClassReflector\MethodReflector;

class MethodReflectorUtil {

    public static function isPublic(MethodReflector $method)
    {
        return $method->getVisibility() === "public";
    }

    public static function filterPublic(array $methods)
    {
        $public = array();
        foreach ($methods as $method) {
            if (self::isPublic($method)) {
                $public[] = $method;
            }
        }
        return $public;
    }

}