<?php
namespace HTML5;

class NodeTest extends \PHPUnit_Framework_TestCase
{
    public function testAdopt()
    {
        $parent = new Node();
        $child = new Node();
        
        $parent->adopt($child);
        
        $this->assertTrue($child->hasParent($parent));
        $this->assertTrue($parent->hasChild($child));
    }
    
    
}