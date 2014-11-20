<?php 
$bootstrap = require dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'bootstrap.php';
$bootstrap();

$element = HTML5\Element::withChildren('html', array(
    new HTML5\Element('head'),
    HTML5\Element::withChildren('body', array(
        new HTML5\Text('Hello World!')
    ))
));

print $element->build();