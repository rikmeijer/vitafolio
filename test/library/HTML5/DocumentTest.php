<?php
namespace HTML5;

class DocumentTest extends \PHPUnit_Framework_TestCase
{
    public function testBuild()
    {
        $document = new Document(new Node\Text('Hello World'));
        $this->assertEquals('<!DOCTYPE html>' . PHP_EOL . '<html><head><body>Hello World</body></html>', $document->build());
    }
    
}