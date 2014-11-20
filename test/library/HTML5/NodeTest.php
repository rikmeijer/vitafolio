<?php
namespace HTML5;

class NodeTest extends \PHPUnit_Framework_TestCase
{
    public function testAdopt()
    {
        $parent = new Node();
        $child = new Node();
        
        $child->adopt($parent);
        
        $this->assertTrue($child->hasParent($parent));
    }
    
    
}