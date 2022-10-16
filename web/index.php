<?php
use piko\Application;

require(__DIR__ . '/../vendor/autoload.php');

$_ENV = array_merge($_ENV, require __DIR__ . '/../env.php');

$config = require __DIR__ . '/../config.php';

(new Application($config))->run();
