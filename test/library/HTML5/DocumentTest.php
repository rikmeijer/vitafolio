<?php
namespace HTML5;

class DocumentTest extends \PHPUnit_Framework_TestCase
{
    public function testBuild()
    {
        $document = new Document(new Node\Element('html'));
        $this->assertEquals('<!DOCTYPE html>' . PHP_EOL . '<html>', $document->build());
    }
    
}