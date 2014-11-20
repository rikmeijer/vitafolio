<?php
namespace HTML5;

class Node
{
    /**
     * 
     * @var Node
     */
    protected $parent;
    
    /**
     * 
     * @param Node $parent
     */
    public function adopt(Node $parent)
    {
        $this->parent = $parent;
    }
    
    /**
     * @param Node $parent
     * @return \HTML5\Node
     */
    public function hasParent(Node $parent)
    {
        return $this->parent === $parent;
    }
}