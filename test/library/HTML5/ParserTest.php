<?php

namespace HTML5;

class ParserTest extends \PHPUnit_Framework_TestCase
{
    public function testParse()
    {
        $parser = new Parser();
        $result = $parser->parse('<element></element>');
        $this->assertEquals('<element>', $result->build());
    }
}