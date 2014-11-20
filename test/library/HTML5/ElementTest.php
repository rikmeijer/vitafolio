<?php
namespace HTML5;

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
}