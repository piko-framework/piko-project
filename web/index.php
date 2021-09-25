<?php
use piko\Application;

define('APP_ROOT', dirname(__DIR__));

require(APP_ROOT . '/vendor/autoload.php');

if (file_exists(APP_ROOT . '/env.php')) {
    $_ENV = array_merge($_ENV, require APP_ROOT . '/env.php');
}

$config = require APP_ROOT . '/config.php';

(new Application($config))->run();