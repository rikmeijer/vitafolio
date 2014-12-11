<?php

namespace HTML5;

class ParserTest extends \PHPUnit_Framework_TestCase
{
    public function testParse()
    {
        $parser = new Parser(new Factory(array()));
        $result = $parser->parse('<element></element>');
        $this->assertEquals('<element></element>', $result[0]->build());
    }
    
    public function testParseDocument()
    {
        $parser = new Parser(new Factory(array()));
        $result = $parser->parse('<!DOCTYPE html><html><head></head><body><element></element></body></html>');
        $this->assertTrue($result instanceof Document);
        $this->assertEquals('<!DOCTYPE html>' . PHP_EOL .'<html><head></head><body><element></element></body></html>', $result->build());
    }
    
    
    public function testParseDocumentMultipleRoot()
    {
        $parser = new Parser(new Factory(array()));
        $result = $parser->parse('<!DOCTYPE html><html2></html2><html3></htm3l>');
        $this->assertTrue($result instanceof Document);
        $this->assertEquals('<!DOCTYPE html>' . PHP_EOL .'<html><head><body></html>', $result->build());
    }
    
    public function testParseDocumentNoRoot()
    {
        $parser = new Parser(new Factory(array()));
        $result = $parser->parse('<!DOCTYPE html> ');
        $this->assertTrue($result instanceof Document);
        $this->assertEquals('<!DOCTYPE html>' . PHP_EOL .'<html><head><body></html>', $result->build());
    }
    
    public function testParseDocumentInvalidRoot()
    {
        $parser = new Parser(new Factory(array()));
        $result = $parser->parse('<!DOCTYPE html><html2></html2>');
        $this->assertTrue($result instanceof Document);
        $this->assertEquals('<!DOCTYPE html>' . PHP_EOL .'<html><head><body></html>', $result->build());
    }

    public function testParseTagName()
    {
        $parser = new Parser(new Factory(array()));
        $result = $parser->parse('<element2></element2>');
        $this->assertEquals('<element2></element2>', $result[0]->build());
    }

    public function testParseClosedEmptyElement()
    {
        $parser = new Parser(new Factory(array()));
        $result = $parser->parse('<element2 />');
        $this->assertEquals('<element2>', $result[0]->build());
    }

    public function testParseChildren()
    {
        $parser = new Parser(new Factory(array()));
        $result = $parser->parse('<element2><child></child><element2 attr1="val1" attr2=val2 attr3="val 3"></element2></element2>');
        $this->assertEquals('<element2><child></child><element2 attr1="val1" attr2="val2" attr3="val 3"></element2></element2>', $result[0]->build());
    }
    
    public function testParseWithAttribute()
    {
        $parser = new Parser(new Factory(array()));
        $result = $parser->parse('<element attr1="val1"></element>');
        $this->assertEquals('<element attr1="val1"></element>', $result[0]->build());
    }
    
    public function testParseWithAttributes()
    {
        $parser = new Parser(new Factory(array()));
        $result = $parser->parse('<element attr1="val1" attr2=val2 attr3="val 3"></element>');
        $this->assertEquals('<element attr1="val1" attr2="val2" attr3="val 3"></element>', $result[0]->build());
    }
}