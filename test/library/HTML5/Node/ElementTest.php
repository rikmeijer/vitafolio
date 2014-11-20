<?php
namespace HTML5\Node;

class ElementTest extends \PHPUnit_Framework_TestCase
{
    public function testBuild()
    {
        $element = new Element('html');
        $this->assertEquals('<html>', $element->build());
    }
    
    public function testBuildWithAttributeString()
    {
        $element = new Element('html');
        $element->setAttributeString('lang', 'nl-NL');
        $this->assertEquals('<html lang="nl-NL">', $element->build());
    }

    public function testBuildWithAttributeArray()
    {
        $element = new Element('html');
        $element->setAttributeArray('class', array('list', 'bullets'));
        $this->assertEquals('<html class="list bullets">', $element->build());
    }
    
    public function testAddChild()
    {
        $element = new Element('html');
        $head = new Element('head');
        $this->assertEquals($head, $element->addChild($head));
        $this->assertEquals('<html><head></html>', $element->build());
        $this->assertTrue($head->hasParent($element));
    }
    

    public function testAddTextChild()
    {
        $element = new Element('html');
        $element->addChild(new Text('head'));
        $this->assertEquals('<html>head</html>', $element->build());
    }
}