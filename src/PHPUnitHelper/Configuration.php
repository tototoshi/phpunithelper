<?php
namespace PHPUnitHelper;


class Configuration {

    private $backupGlobals = true;

    private $backupStaticAttributes = false;

    private $bootstrap = 'vendor/autoload.php';

    private $cacheTokens = false;

    private $colors = false;

    private $convertErrorsToExceptions = true;

    private $convertNoticesToExceptions = true;

    private $convertWarningsToExceptions = true;

    private $forceCoversAnnotation = false;

    private $mapTestClassNameToCoveredClassName = false;

    private $printerClass = 'PHPUnit_TextUI_ResultPrinter';

    private $printerFile = '';

    private $processIsolation = false;

    private $stopOnError = false;

    private $stopOnFailure = false;

    private $stopOnIncomplete = false;

    private $stopOnSkipped = false;

    private $testSuiteLoaderClass = 'PHPUnit_Runner_StandardTestSuiteLoader';

    private $testSuiteLoaderFile = '';

    private $timeoutForSmallTests = 1;

    private $timeoutForMediumTests = 10;

    private $timeoutForLargeTests = 60;

    private $strict = false;

    private $verbose = false;

    private $testsuites = array();

    /**
     * @param boolean $backupGlobals
     */
    public function setBackupGlobals($backupGlobals)
    {
        $this->backupGlobals = $backupGlobals;
    }

    /**
     * @return boolean
     */
    public function getBackupGlobals()
    {
        return $this->backupGlobals;
    }

    /**
     * @param boolean $backupStaticAttributes
     */
    public function setBackupStaticAttributes($backupStaticAttributes)
    {
        $this->backupStaticAttributes = $backupStaticAttributes;
    }

    /**
     * @return boolean
     */
    public function getBackupStaticAttributes()
    {
        return $this->backupStaticAttributes;
    }

    /**
     * @param string $bootstrap
     */
    public function setBootstrap($bootstrap)
    {
        $this->bootstrap = $bootstrap;
    }

    /**
     * @return string
     */
    public function getBootstrap()
    {
        return $this->bootstrap;
    }

    /**
     * @param boolean $cacheTokens
     */
    public function setCacheTokens($cacheTokens)
    {
        $this->cacheTokens = $cacheTokens;
    }

    /**
     * @return boolean
     */
    public function getCacheTokens()
    {
        return $this->cacheTokens;
    }

    /**
     * @param boolean $colors
     */
    public function setColors($colors)
    {
        $this->colors = $colors;
    }

    /**
     * @return boolean
     */
    public function getColors()
    {
        return $this->colors;
    }

    /**
     * @param boolean $convertErrorsToExceptions
     */
    public function setConvertErrorsToExceptions($convertErrorsToExceptions)
    {
        $this->convertErrorsToExceptions = $convertErrorsToExceptions;
    }

    /**
     * @return boolean
     */
    public function getConvertErrorsToExceptions()
    {
        return $this->convertErrorsToExceptions;
    }

    /**
     * @param boolean $convertNoticesToExceptions
     */
    public function setConvertNoticesToExceptions($convertNoticesToExceptions)
    {
        $this->convertNoticesToExceptions = $convertNoticesToExceptions;
    }

    /**
     * @return boolean
     */
    public function getConvertNoticesToExceptions()
    {
        return $this->convertNoticesToExceptions;
    }

    /**
     * @param boolean $convertWarningsToExceptions
     */
    public function setConvertWarningsToExceptions($convertWarningsToExceptions)
    {
        $this->convertWarningsToExceptions = $convertWarningsToExceptions;
    }

    /**
     * @return boolean
     */
    public function getConvertWarningsToExceptions()
    {
        return $this->convertWarningsToExceptions;
    }

    /**
     * @param boolean $forceCoversAnnotation
     */
    public function setForceCoversAnnotation($forceCoversAnnotation)
    {
        $this->forceCoversAnnotation = $forceCoversAnnotation;
    }

    /**
     * @return boolean
     */
    public function getForceCoversAnnotation()
    {
        return $this->forceCoversAnnotation;
    }

    /**
     * @param boolean $mapTestClassNameToCoveredClassName
     */
    public function setMapTestClassNameToCoveredClassName($mapTestClassNameToCoveredClassName)
    {
        $this->mapTestClassNameToCoveredClassName = $mapTestClassNameToCoveredClassName;
    }

    /**
     * @return boolean
     */
    public function getMapTestClassNameToCoveredClassName()
    {
        return $this->mapTestClassNameToCoveredClassName;
    }

    /**
     * @param string $printerClass
     */
    public function setPrinterClass($printerClass)
    {
        $this->printerClass = $printerClass;
    }

    /**
     * @return string
     */
    public function getPrinterClass()
    {
        return $this->printerClass;
    }

    /**
     * @param string $printerFile
     */
    public function setPrinterFile($printerFile)
    {
        $this->printerFile = $printerFile;
    }

    /**
     * @return string
     */
    public function getPrinterFile()
    {
        return $this->printerFile;
    }

    /**
     * @param boolean $processIsolation
     */
    public function setProcessIsolation($processIsolation)
    {
        $this->processIsolation = $processIsolation;
    }

    /**
     * @return boolean
     */
    public function getProcessIsolation()
    {
        return $this->processIsolation;
    }

    /**
     * @param boolean $stopOnError
     */
    public function setStopOnError($stopOnError)
    {
        $this->stopOnError = $stopOnError;
    }

    /**
     * @return boolean
     */
    public function getStopOnError()
    {
        return $this->stopOnError;
    }

    /**
     * @param boolean $stopOnFailure
     */
    public function setStopOnFailure($stopOnFailure)
    {
        $this->stopOnFailure = $stopOnFailure;
    }

    /**
     * @return boolean
     */
    public function getStopOnFailure()
    {
        return $this->stopOnFailure;
    }

    /**
     * @param boolean $stopOnIncomplete
     */
    public function setStopOnIncomplete($stopOnIncomplete)
    {
        $this->stopOnIncomplete = $stopOnIncomplete;
    }

    /**
     * @return boolean
     */
    public function getStopOnIncomplete()
    {
        return $this->stopOnIncomplete;
    }

    /**
     * @param boolean $stopOnSkipped
     */
    public function setStopOnSkipped($stopOnSkipped)
    {
        $this->stopOnSkipped = $stopOnSkipped;
    }

    /**
     * @return boolean
     */
    public function getStopOnSkipped()
    {
        return $this->stopOnSkipped;
    }

    /**
     * @param boolean $strict
     */
    public function setStrict($strict)
    {
        $this->strict = $strict;
    }

    /**
     * @return boolean
     */
    public function getStrict()
    {
        return $this->strict;
    }

    /**
     * @param string $testSuiteLoaderClass
     */
    public function setTestSuiteLoaderClass($testSuiteLoaderClass)
    {
        $this->testSuiteLoaderClass = $testSuiteLoaderClass;
    }

    /**
     * @return string
     */
    public function getTestSuiteLoaderClass()
    {
        return $this->testSuiteLoaderClass;
    }

    /**
     * @param string $testSuiteLoaderFile
     */
    public function setTestSuiteLoaderFile($testSuiteLoaderFile)
    {
        $this->testSuiteLoaderFile = $testSuiteLoaderFile;
    }

    /**
     * @return string
     */
    public function getTestSuiteLoaderFile()
    {
        return $this->testSuiteLoaderFile;
    }

    /**
     * @param int $timeoutForLargeTests
     */
    public function setTimeoutForLargeTests($timeoutForLargeTests)
    {
        $this->timeoutForLargeTests = $timeoutForLargeTests;
    }

    /**
     * @return int
     */
    public function getTimeoutForLargeTests()
    {
        return $this->timeoutForLargeTests;
    }

    /**
     * @param int $timeoutForMediumTests
     */
    public function setTimeoutForMediumTests($timeoutForMediumTests)
    {
        $this->timeoutForMediumTests = $timeoutForMediumTests;
    }

    /**
     * @return int
     */
    public function getTimeoutForMediumTests()
    {
        return $this->timeoutForMediumTests;
    }

    /**
     * @param int $timeoutForSmallTests
     */
    public function setTimeoutForSmallTests($timeoutForSmallTests)
    {
        $this->timeoutForSmallTests = $timeoutForSmallTests;
    }

    /**
     * @return int
     */
    public function getTimeoutForSmallTests()
    {
        return $this->timeoutForSmallTests;
    }

    /**
     * @param boolean $verbose
     */
    public function setVerbose($verbose)
    {
        $this->verbose = $verbose;
    }

    /**
     * @return boolean
     */
    public function getVerbose()
    {
        return $this->verbose;
    }

    /**
     * @param array $testsuites
     */
    public function setTestsuites($testsuites)
    {
        $this->testsuites = $testsuites;
    }

    /**
     * @return array
     */
    public function getTestsuites()
    {
        return $this->testsuites;
    }

}