<?php
namespace HTML5;

class Node
{
    private $parent;
    
    public function adopt(Node $child)
    {
        $child->parent = $this;
    }
    
    public function getParent()
    {
        return $this->parent;
    }
}