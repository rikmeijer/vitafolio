<?php
namespace HTML5;

class NodeTest extends \PHPUnit_Framework_TestCase
{
    public function testAdopt()
    {
        $parent = new Node();
        $child = new Node();
        
        $parent->adopt($child);
        
        $this->assertEquals($parent, $child->getParent());
        $this->assertTrue($parent->hasChild($child));
    }
    
    
}