<?php
namespace PHPUnitHelper\Reflector;

use phpDocumentor\Reflection\FileReflector;
use PHPUnitHelper\Exception\ClassNotContainedException;

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

}