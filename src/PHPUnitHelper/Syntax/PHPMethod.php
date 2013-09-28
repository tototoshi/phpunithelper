<?php
namespace PHPUnitHelper\Syntax;

class PHPMethod
{

    private $name;

    private $static;

    private $arguments;

    public function __construct($name, $static = false, array $arguments = array())
    {
        $this->name = $name;
        $this->static = $static;
        $this->arguments = $arguments;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * @param PHPMethodArgument $arguments
     */
    public function setArguments(PHPMethodArgument $arguments)
    {
        $this->arguments = $arguments;
    }

    /**
     * @param PHPMethodArgument $arguments
     */
    public function addArguments(PHPMethodArgument $arguments)
    {
        $this->arguments[] = $arguments;
    }

    /**
     * @param bool $static
     */
    public function setStatic($static)
    {
        $this->static = $static;
    }

    /**
     * @return bool
     */
    public function isStatic()
    {
        return $this->static;
    }

}