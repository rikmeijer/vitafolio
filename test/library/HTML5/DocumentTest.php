<?php
namespace HTML5;

class DocumentTest extends \PHPUnit_Framework_TestCase
{
    public function testBuild()
    {
        $document = new Document(new Node\Text('Hello World'));
        $this->assertEquals('<!DOCTYPE html>' . PHP_EOL . '<html><head><body>Hello World</body></html>', $document->build());
    }

    public function testAddChild()
    {
        $element = new Document();
        $element->addChild($head = new Node\Element('div'));
        $this->assertEquals('<!DOCTYPE html>' . PHP_EOL . '<html><head><body><div></body></html>', $element->build());
        // $this->assertTrue($head->hasParent($element));
    }
    
    
    public function testAddTextChild()
    {
        $element = new Document();
        $element->addChild(new Node\Text('head'));
        $this->assertEquals('<!DOCTYPE html>' . PHP_EOL . '<html><head><body>head</body></html>', $element->build());
    }
    
}