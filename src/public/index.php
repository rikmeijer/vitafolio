<?php 
$bootstrap = require dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'bootstrap.php';
$bootstrap();

$document = new HTML5\Document(new HTML5\Node\Text('Hello World!'));

print $document->build();