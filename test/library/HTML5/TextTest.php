<?php
namespace HTML5;

class TextTest extends \PHPUnit_Framework_TestCase
{
    public function testBuild()
    {
        $element = new Text('Hello World');
        $this->assertEquals('Hello World', $element->build());
    }

    public function testBuildWithSpecialCharacters()
    {
        $element = new Text('Hello <World>');
        $this->assertEquals('Hello &lt;World&gt;', $element->build());
    }
}