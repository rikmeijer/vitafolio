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
        $this->assertEquals('<!DOCTYPE html>' . PHP_EOL . '<html><head><body><div></body></html>', $document->build());
    }
    

    public function testCreateElement()
    {
        $factory = new Factory(array());
        $this->assertEquals('<html>', $factory->createElement('html')->build());
    }
    
    public function testCreateText()
    {
        $factory = new Factory(array());
        $this->assertEquals('html', $factory->createText('html')->build());
    }
    
    public function testCreateParser()
    {
        $factory = new Factory(array());
        $this->assertEquals('<html></html>', $factory->createParser()->parse('<html></html>')[0]->build());
    }
}