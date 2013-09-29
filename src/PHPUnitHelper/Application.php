<?php
namespace PHPUnitHelper;

require 'vendor/autoload.php';

$version = '0.1.0-dev';
$app = new \Cilex\Application('phpunithelper', $version);
$app->command(new GenerateCommand());
$app->command(new ConfigCommand());
$app->run();
