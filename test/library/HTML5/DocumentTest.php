<?php
namespace HTML5;

class DocumentTest extends \PHPUnit_Framework_TestCase
{
    public function testBuild()
    {
        $document = new Document();
        $this->assertEquals('<!DOCTYPE html>', $document->build());
    }
    
    
}