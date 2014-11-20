<?php 
$bootstrap = require dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'bootstrap.php';
$bootstrap();

$document = new HTML5\Document(HTML5\Node\Element::withChildren('html', array(
    new HTML5\Node\Element('head'),
    HTML5\Node\Element::withChildren('body', array(
        new HTML5\Node\Text('Hello World!')
    ))
)));

print $document->build();