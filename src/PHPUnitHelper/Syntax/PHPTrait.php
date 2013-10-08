<?php
namespace PHPUnitHelper\Syntax;


class PHPTrait {

    private $name;

    private $methods;

    private $namespace;

    public function __construct($name, $methods = array(), $namespace = '')
    {
        $this->name = $name;
        $this->methods = array();
        $this->namespace = $namespace;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $methods
     */
    public function setMethods(array $methods)
    {
        $this->methods = $methods;
    }

    /**
     * @param PHPMethod $method
     */
    public function addMethod(PHPMethod $method)
    {
        $this->methods[] = $method;
    }

    /**
     * @return PHPMethod
     */
    public function getMethods()
    {
        return $this->methods;
    }

    /**
     * @param string $namespace
     */
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

}