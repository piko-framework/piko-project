<?php
use Piko\ModularApplication;

require(__DIR__ . '/../vendor/autoload.php');

foreach (require __DIR__ . '/../env.php' as $key => $val) {
    putenv("{$key}={$val}");
}

$config = require __DIR__ . '/../config/app.php';

(new ModularApplication($config))->run();
