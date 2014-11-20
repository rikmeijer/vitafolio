<?php
namespace HTML5;

class FactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateDocument()
    {
        $factory = new Factory(array());
        $this->assertTrue($factory->createDocument() instanceof Document);
    }
}