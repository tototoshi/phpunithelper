<?php
namespace PHPUnitHelper;

use Cilex\Command\Command;
use phpDocumentor\Reflection\FileReflector;
use PHPUnitHelper\Exception\ClassNotContainedException;
use PHPUnitHelper\Generator\ConfigurationXMLGenerator;
use PHPUnitHelper\Generator\SkeletonGenerator;
use PHPUnitHelper\Reflector\ClassReflectorConverter;
use PHPUnitHelper\Reflector\FileReflectorUtil;
use PHPUnitHelper\Syntax\TestClass;
use PHPUnitHelper\Util\FileUtil;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

require 'vendor/autoload.php';

class ConfigCommand extends Command
{

    protected function configure()
    {
        $this
            ->setName('config')
            ->setDescription('Generate phpunit.xml.dist');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $config = new Configuration();
        $testsuites = new TestSuite('my test suite.', 'test/');

        $outFilename = 'phpunit.xml.dist2';

        $xml = ConfigurationXMLGenerator::generate($config, array($testsuites));

        if (file_exists($outFilename)) {
            $output->writeln("$outFilename already exists!");
        } else {
            file_put_contents($outFilename, $xml);
        }
    }

}