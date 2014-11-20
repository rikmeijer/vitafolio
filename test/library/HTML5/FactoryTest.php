<?php
namespace HTML5;

class FactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateDocument()
    {
        $factory = new Factory(array());
        $this->assertTrue($factory->createDocument() instanceof Document);
    }
    public function testCreateDocumentWithChildren()
    {
        $factory = new Factory(array());
        
        $document = $factory->createDocumentWithChildren(array(new Node\Element('div')));
        $this->assertTrue($document instanceof Document);
        $this->assertEquals('<!DOCTYPE html>' . PHP_EOL . '<html><head><body><div></body></html>', $document->build());
    }
}