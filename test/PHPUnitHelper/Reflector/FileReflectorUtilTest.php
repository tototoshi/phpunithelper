<?php
namespace PHPUnitHelper\Reflector;

use PHPUnitHelper\Syntax\PHPClass;
use PHPUnitHelper\Syntax\PHPTrait;

class FileReflectorUtilTest extends \PHPUnit_Framework_TestCase
{

    private $tmp_class_filename = '/tmp/filereflectorutiltest.php';
    private $tmp_trait_filename = '/tmp/filereflectorutiltest_trait.php';

    public function setUp()
    {
        file_put_contents($this->tmp_class_filename, "
        <?php
        class A
        {
        }
        ");
        file_put_contents($this->tmp_trait_filename, "
        <?php
        trait A
        {
        }
        ");
    }

    public function tearDown()
    {
        unlink($this->tmp_class_filename);
        unlink($this->tmp_trait_filename);
    }

    public function testGetPHPClass()
    {
        $expected = new PHPClass('A');
        $expected->setNamespace('global');
        $actual = FileReflectorUtil::getPHPClass($this->tmp_class_filename);
        $this->assertEquals($expected, $actual);
    }

    public function testGetPHPTrait()
    {
        $expected = new PHPTrait('A');
        $expected->setNamespace('global');
        $actual = FileReflectorUtil::getPHPTrait($this->tmp_trait_filename);
        $this->assertEquals($expected, $actual);
    }

}
