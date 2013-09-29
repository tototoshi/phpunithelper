<?php
namespace PHPUnitHelper\Generator;

use PHPUnitHelper\Configuration;
use PHPUnitHelper\TestSuite;

class ConfigurationXMLGeneratorTest extends \PHPUnit_Framework_TestCase
{

    public function testGenerate()
    {
        $configuration = new Configuration();
        $testsuite = new TestSuite('my test suite', 'test/');
        $actual = ConfigurationXMLGenerator::generate($configuration, array($testsuite));

        $xml = simplexml_load_string($actual);

        $this->assertEquals('true', $xml->attributes()['backupGlobals']);
        $this->assertEquals('my test suite', $xml->testsuites->testsuite->attributes()['name']);
        $this->assertEquals('test/', $xml->testsuites->testsuite->directory);
    }

}
