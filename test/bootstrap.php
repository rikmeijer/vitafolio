<?php
$environmentBootstrap = require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php';

$environment = $environmentBootstrap(null);

define('SRC_PATH', $environment['root-path'] . DIRECTORY_SEPARATOR . 'src');

unset($environment);