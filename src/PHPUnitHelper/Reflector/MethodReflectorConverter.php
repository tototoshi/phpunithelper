<?php
namespace PHPUnitHelper\Reflector;

use phpDocumentor\Reflection\ClassReflector\MethodReflector;
use PHPUnitHelper\Syntax\PHPMethod;

class MethodReflectorConverter {

    public static function toPHPMethod(MethodReflector $reflectedMethod)
    {
        $method = new PHPMethod($reflectedMethod->getName());
        $reflectedArguments = $reflectedMethod->getArguments();
        foreach ($reflectedArguments as $reflectedArgument) {
            $method->setStatic($reflectedMethod->isStatic());
            $method->addArguments(
                ArgumentReflectorConverter::toPHPMethodArgument($reflectedArgument)
            );
        }
        return $method;
    }

}