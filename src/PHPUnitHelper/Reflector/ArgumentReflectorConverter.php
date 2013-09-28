<?php
namespace PHPUnitHelper\Reflector;

use phpDocumentor\Reflection\FunctionReflector\ArgumentReflector;
use PHPUnitHelper\Syntax\PHPMethodArgument;

class ArgumentReflectorConverter {

    public static function toPHPMethodArgument(ArgumentReflector $arg)
    {
        return new PHPMethodArgument(
            $arg->getName(),
            $arg->getType()
        );
    }

}