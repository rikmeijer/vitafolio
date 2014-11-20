<?php
namespace HTML5;

class DocumentTest extends \PHPUnit_Framework_TestCase
{
    public function testBuild()
    {
        $document = new Document();
        $this->assertEquals('<!DOCTYPE html>' . PHP_EOL . '<html><head><body></html>', $document->build());
    }

    public function testAddChild()
    {
        $document = new Document();
        $document->addChild(new Node\Element('div'));
        $this->assertEquals('<!DOCTYPE html>' . PHP_EOL . '<html><head><body><div></body></html>', $document->build());
    }
    
    
    public function testAddTextChild()
    {
        $element = new Document();
        $element->addChild(new Node\Text('head'));
        $this->assertEquals('<!DOCTYPE html>' . PHP_EOL . '<html><head><body>head</body></html>', $element->build());
    }
    
}