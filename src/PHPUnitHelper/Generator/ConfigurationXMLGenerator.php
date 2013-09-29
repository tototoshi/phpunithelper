<?php
namespace PHPUnitHelper\Generator;


use PHPUnitHelper\Configuration;

class ConfigurationXMLGenerator {

    private static function boolString($bool) {
        return $bool ? 'true' : 'false';
    }

    public static function generate(Configuration $conf, array $testsuites = array())
    {
        $xml = new \DOMDocument('1.0');
        $root = $xml->createElement('phpunit');
        $root->setAttribute('backupGlobals', self::boolString($conf->getBackupGlobals()));
        $root->setAttribute('backupStaticAttributes', self::boolString($conf->getBackupStaticAttributes()));
        $root->setAttribute('bootstrap', $conf->getBootstrap());
        $root->setAttribute('cacheTokens', self::boolString($conf->getCacheTokens()));
        $root->setAttribute('colors', self::boolString($conf->getColors()));
        $root->setAttribute('convertErrorsToExceptions', self::boolString($conf->getConvertErrorsToExceptions()));
        $root->setAttribute('convertNoticesToExceptions', self::boolString($conf->getConvertNoticesToExceptions()));
        $root->setAttribute('convertWarningsToExceptions', self::boolString($conf->getConvertWarningsToExceptions()));
        $root->setAttribute('forceCoversAnnotation', self::boolString($conf->getForceCoversAnnotation()));
        $root->setAttribute('mapTestClassNameToCoveredClassName', self::boolString($conf->getMapTestClassNameToCoveredClassName()));
        if ($conf->getPrinterFile()) {
            $root->setAttribute('printerFile', $conf->getPrinterFile());
        } else {
            $root->setAttribute('printerClass', $conf->getPrinterClass());
        }
        $root->setAttribute('processIsolation', self::boolString($conf->getProcessIsolation()));
        $root->setAttribute('stopOnError', self::boolString($conf->getStopOnError()));
        $root->setAttribute('stopOnFailure', self::boolString($conf->getStopOnFailure()));
        $root->setAttribute('stopOnIncomplete', self::boolString($conf->getStopOnIncomplete()));
        $root->setAttribute('stopOnSkipped', self::boolString($conf->getStopOnSkipped()));
        if ($conf->getTestSuiteLoaderFile()) {
            $root->setAttribute('testSuiteLoaderFile', $conf->getTestSuiteLoaderFile());
        } else {
            $root->setAttribute('testSuiteLoaderClass', $conf->getTestSuiteLoaderClass());
        }
        $root->setAttribute('timeoutForSmallTests', $conf->getTimeoutForSmallTests());
        $root->setAttribute('timeoutForMediumTests', $conf->getTimeoutForMediumTests());
        $root->setAttribute('timeoutForLargeTests', $conf->getTimeoutForLargeTests());
        $root->setAttribute('strict', self::boolString($conf->getStrict()));
        $root->setAttribute('verbose', self::boolString($conf->getVerbose()));


        $xml->appendChild($root);

        $testsuitesElement = $xml->createElement('testsuites');
        foreach ($testsuites as $testsuite) {
            $testsuiteElement = $xml->createElement('testsuite');
            $testsuiteElement->setAttribute('name', $testsuite->getName());
            $testsuiteDirectoryElement = $xml->createElement('directory', $testsuite->getDirectory());
            $testsuiteElement->appendChild($testsuiteDirectoryElement);
            $testsuitesElement->appendChild($testsuiteElement);
        }

        $root->appendChild($testsuitesElement);

        $xml->formatOutput = true;
        $xml->preserveWhiteSpace = true;
        return $xml->saveXML();
    }

}