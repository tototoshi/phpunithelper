<?php
namespace PHPUnitHelper;

use Cilex\Command\Command;
use phpDocumentor\Reflection\FileReflector;
use PHPUnitHelper\Exception\ClassNotContainedException;
use PHPUnitHelper\Exception\ParseFailedException;
use PHPUnitHelper\Exception\TraitNotContainedException;
use PHPUnitHelper\Generator\SkeletonGenerator;
use PHPUnitHelper\Reflector\ClassReflectorConverter;
use PHPUnitHelper\Reflector\FileReflectorUtil;
use PHPUnitHelper\Syntax\TestClass;
use PHPUnitHelper\Util\FileUtil;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

require 'vendor/autoload.php';

class GenerateCommand extends Command
{
    const ARG_IN_FILE = 'infile';

    const ARG_OUT_DIRECTORY = 'outdir';

    protected function configure()
    {
        $this
            ->setName('generate')
            ->setAliases(array('g'))
            ->setDescription('Generate Test Class Skeleton')
            ->addArgument(self::ARG_IN_FILE, InputArgument::REQUIRED, 'filename')
            ->addArgument(self::ARG_OUT_DIRECTORY, InputArgument::REQUIRED, 'generated filename');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $inFilename = $input->getArgument(self::ARG_IN_FILE);
        $outDirectoryName = $input->getArgument(self::ARG_OUT_DIRECTORY);

        try {
            $class = FileReflectorUtil::getPHPClass($inFilename);
        } catch (ClassNotContainedException $e) {
            try {
                $trait = FileReflectorUtil::getPHPTrait($inFilename);
            } catch (TraitNotContainedException $e) {
                throw new ParseFailedException('Class or Trait is not contained in the file.');
            }
        }


        if (isset($class)) {
            $testClass = new TestClass($class->getName());
            $generator = new SkeletonGenerator();
            $skeleton = $generator->generateClassSkeletonFromPHPClass($class);
        } else {
            $testClass = new TestClass($trait->getName());
            $generator = new SkeletonGenerator();
            $skeleton = $generator->generateClassSkeletonFromPHPTrait($trait);
        }

        $outFilename = FileUtil::join(
            $outDirectoryName,
            $testClass->getTestClassFileName()
        );


        if (file_exists($outFilename)) {
            $output->writeln("$outFilename already exists!");
        } else {
            FileUtil::ensureDirectoryExists($outDirectoryName);
            file_put_contents($outFilename, $skeleton);
        }
    }

}