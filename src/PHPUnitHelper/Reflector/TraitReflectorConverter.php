<?php
namespace PHPUnitHelper\Reflector;

use phpDocumentor\Reflection\ClassReflector;
use phpDocumentor\Reflection\TraitReflector;
use PHPUnitHelper\Syntax\PHPClass;
use PHPUnitHelper\Syntax\PHPTrait;

class TraitReflectorConverter {

    public static function toPHPTrait(TraitReflector $reflectedTrait)
    {
        $trait = new PHPTrait($reflectedTrait->getShortName());

        $reflectedMethods = MethodReflectorUtil::filterPublic($reflectedTrait->getMethods());

        foreach ($reflectedMethods as $reflectedMethod) {
            $method = MethodReflectorConverter::toPHPMethod($reflectedMethod);
            $trait->addMethod($method);
        }

        $trait->setNamespace($reflectedTrait->getNamespace());

        return $trait;
    }

}