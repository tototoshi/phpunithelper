<?php
namespace PHPUnitHelper;

require 'vendor/autoload.php';

$app = new \Cilex\Application('phpunithelper');
$app->command(new GenerateCommand());
$app->run();
