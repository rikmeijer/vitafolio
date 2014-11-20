<?php 
$bootstrap = require dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'bootstrap.php';
$bootstrap();

$document = HTML5\Document::withChildren(array(new HTML5\Node\Text('Hello World!')));

print $document->build();