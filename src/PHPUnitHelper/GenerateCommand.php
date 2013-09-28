<?php
namespace PHPUnitHelper;

use Cilex\Command\Command;
use phpDocumentor\Reflection\FileReflector;
use PHPUnitHelper\Exception\ClassNotContainedException;
use PHPUnitHelper\Generator\SkeltonGenerator;
use PHPUnitHelper\Reflector\ClassReflectorConverter;
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
            ->setDescription('Test')
            ->addArgument(self::ARG_IN_FILE, InputArgument::REQUIRED, 'filename')
            ->addArgument(self::ARG_OUT_DIRECTORY, InputArgument::REQUIRED, 'generated filename');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $inFilename = $input->getArgument(self::ARG_IN_FILE);
        $outDirectoryName = $input->getArgument(self::ARG_OUT_DIRECTORY);
        $class = $this->getPHPClass($inFilename);
        $generator = new SkeltonGenerator();

        $testClassFilename = $class->getName() . "Test.php";
        $outFilename = rtrim($outDirectoryName, '/') . '/' . $testClassFilename;
        if (file_exists($outFilename)) {
            $output->writeln("$outFilename already exists!");
        } else {
            if (!file_exists($outDirectoryName)) {
                $recursive = true;
                mkdir($outDirectoryName, 0755, $recursive);
            }
            $outFilename = rtrim($outDirectoryName, '/') . '/' . $testClassFilename;
            file_put_contents($outFilename, $generator->generateClassSkelton($class));
        }
    }

    private function getPHPClass($filename)
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