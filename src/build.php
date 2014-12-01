<?php 
$bootstrap = require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'bootstrap.php';
$services = $bootstrap($_SERVER['argv'][1]);

$document = require __DIR__ . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'index.php';

$document($services, function($path, $contents) {
    file_put_contents($_SERVER['argv'][1] . $path, $contents);
});