<?php
namespace HTML;

class ElementTest extends \PHPUnit_Framework_TestCase
{
    public function testBuild()
    {
        $element = new Element('html');
        $this->assertEquals('<html></html>', $element->build());
    }
    
}