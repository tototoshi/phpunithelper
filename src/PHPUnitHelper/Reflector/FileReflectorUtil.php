<?php
namespace PHPUnitHelper\Reflector;

use phpDocumentor\Reflection\FileReflector;
use PHPUnitHelper\Exception\ClassNotContainedException;
use PHPUnitHelper\Exception\TraitNotContainedException;

class FileReflectorUtil {

    public static function getPHPClass($filename)
    {
        $file = new FileReflector($filename);
        $file->process();
        $reflectedClasses = $file->getClasses();

        if (count($reflectedClasses) === 0) {
            throw new ClassNotContainedException("$filename doesn't contain any PHP class.");
        }
        return ClassReflectorConverter::toPHPClass($reflectedClasses[0]);
    }

    public static function getPHPTrait($filename)
    {
        $file = new FileReflector($filename);
        $file->process();
        $reflectedTraits = $file->getTraits();
        if (count($reflectedTraits) === 0) {
            throw new TraitNotContainedException("$filename doesn't contain any PHP class.");
        }
        return TraitReflectorConverter::toPHPTrait($reflectedTraits[0]);
    }

}