<?php
namespace PHPUnitHelper\Generator;

use PHPUnitHelper\Syntax\PHPMethod;
use PHPUnitHelper\Syntax\PHPClass;
use PHPUnitHelper\Syntax\PHPMethodArgument;

class SkeletonGeneratorTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var SkeletonGenerator $fixture;
     */
    private $fixture;

    public function setUpBefore()
    {
    }

    public function setUp()
    {
        $this->fixture = new SkeletonGenerator();
    }

    public function testGenerateMethodSkeleton()
    {
        $method = new PHPMethod("generate");
        $method->addArguments(new PHPMethodArgument('$arg1', ''));
        $method->addArguments(new PHPMethodArgument('$arg2', 'array'));

        $expected =
            "/**\n" .
            " * @TODO This method was generated by PHPUnitHelper\n" .
            " */\n" .
            "public function testGenerate()\n" .
            "{\n" .
            "    \$arg1 = '';\n" .
            "    \$arg2 = array();\n" .
            "    // \$expected =\n" .
            "    // \$this->assertEquals(\$expected, \$actual);\n" .
            "}\n";
        $code = $this->fixture->generateMethodSkeleton($method);
        $this->assertEquals($expected, $code);
    }

    public function testGenerateClassSkeletonFromClass()
    {
        $method = new PHPMethod("generate");

        $class = new PHPClass("Hello");
        $class->setNamespace('global');
        $class->addMethod($method);

        $expected =
            "<?php\n" .
            "class HelloTest extends \\PHPUnit_Framework_TestCase\n" .
            "{\n" .
            "\n" .
            "    /**\n" .
            "     * @TODO This method was generated by PHPUnitHelper\n" .
            "     */\n" .
            "    public function testGenerate()\n" .
            "    {\n" .
            "        // \$expected =\n" .
            "        // \$this->assertEquals(\$expected, \$actual);\n" .
            "    }\n" .
            "\n" .
            "}\n";

        $code = $this->fixture->generateClassSkeletonFromPHPClass($class);
        $this->assertEquals($expected, $code);
    }

}