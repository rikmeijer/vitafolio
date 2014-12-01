<?php 
$bootstrap = require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'bootstrap.php';
$services = $bootstrap();

$document = $services['library']['HTML5']()->createDocumentWithChildren(array(new HTML5\Node\Text('Hello World!')));

print $document->build();