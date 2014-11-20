<?php 
$bootstrap = require dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'bootstrap.php';
$services = $bootstrap();

$document = $services['library']['HTML5']($services)->createDocumentwithChildren(array(new HTML5\Node\Text('Hello World!')));

print $document->build();