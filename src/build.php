<?php 
$bootstrap = require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'bootstrap.php';
$services = $bootstrap();

$document = require __DIR__ . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'index.php';

file_put_contents($_SERVER['argv'][1] . DIRECTORY_SEPARATOR . 'index.html', $document($services)->build());