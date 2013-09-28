<?php
namespace PHPUnitHelper\Reflector;

use phpDocumentor\Reflection\ClassReflector;
use PHPUnitHelper\Syntax\PHPClass;

class ClassReflectorConverter {

    public static function toPHPClass(ClassReflector $reflectedClass)
    {
        $class = new PHPClass($reflectedClass->getShortName());

        $reflectedMethods = MethodReflectorUtil::filterPublic($reflectedClass->getMethods());

        foreach ($reflectedMethods as $reflectedMethod) {
            $method = MethodReflectorConverter::toPHPMethod($reflectedMethod);
            $class->addMethod($method);
        }

        $class->setNamespace($reflectedClass->getNamespace());

        return $class;
    }

}