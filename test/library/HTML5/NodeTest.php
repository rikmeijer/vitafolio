<?php
namespace HTML5;

class NodeTest extends \PHPUnit_Framework_TestCase
{
    public function testAdopt()
    {
        $parent = new Document(new Factory(array()));
        $child = new Node();
        
        $child->adopt($parent);
        
        $this->assertTrue($child->hasParent($parent));
    }
    
    
}