<?php
/**
 * Created by JetBrains PhpStorm.
 * User: toshi
 * Date: 2013/09/29
 * Time: 22:52
 * To change this template use File | Settings | File Templates.
 */

namespace PHPUnitHelper\Syntax;


class TestClass {

    private $className;

    const PHP_EXT = 'php';

    const DEFAULT_TEST_CLASS_SUFFIX = 'Test';

    public function __construct($className)
    {
        $this->className = $className;
    }

    private function defaultNamingRule($className)
    {
        return $className . self::DEFAULT_TEST_CLASS_SUFFIX;
    }

    public function getTestClassName()
    {
        return $this->defaultNamingRule($this->className);
    }

    public function getTestClassFileName()
    {
        return $this->getTestClassName() . '.' . self::PHP_EXT;
    }

}