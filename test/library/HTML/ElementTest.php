<?php
namespace HTML;

class ElementTest extends \PHPUnit_Framework_TestCase
{
    public function testBuild()
    {
        $element = new Element('html');
        $this->assertEquals('<html></html>', $element->build());
    }
    
    public function testBuildWithAttributes()
    {
        $element = new Element('html');
        $element->setAttribute('lang', 'nl-NL');
        $this->assertEquals('<html lang="nl-NL"></html>', $element->build());
    }
    
}