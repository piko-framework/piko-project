<?php
use piko\Application;
use piko\Utils;

define('APP_ROOT', dirname(__DIR__));

require(APP_ROOT . '/vendor/autoload.php');

if (file_exists(APP_ROOT . '/.env')) {
    Utils::parseEnvFile(APP_ROOT . '/.env');
}

$config = require APP_ROOT . '/config.php';

(new Application($config))->run();