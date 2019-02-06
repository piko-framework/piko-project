<?php
/**
 * This file is part of Piko framework
 * @copyright  (C) 2017 PHILIP Sylvain. All rights reserved.
 * @license    LGPL-3.0 see LICENSE file
 */

define('APP_ROOT', dirname(__DIR__));

require(APP_ROOT . '/vendor/autoload.php');

if (file_exists(APP_ROOT . '/.env')) {
    \piko\Utils::parseEnvFile(APP_ROOT . '/.env');
}

$config = require APP_ROOT . '/config.php';

(new \piko\Application($config))->run();