<?php

namespace HTML5;

class ParserTest extends \PHPUnit_Framework_TestCase
{
    public function testParse()
    {
        $parser = new Parser(new Factory(array()));
        $result = $parser->parse('<element></element>');
        $this->assertEquals('<element>', $result->build());
    }
    
//     public function testParseWithAttributes()
//     {
//         $parser = new Parser();
//         $result = $parser->parse('<element attr1="val1"></element>');
//         $this->assertEquals('<element attr1="val1">', $result->build());
//     }
}