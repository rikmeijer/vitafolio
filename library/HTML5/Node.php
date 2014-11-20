<?php
namespace HTML5;

class Node
{
    /**
     * 
     * @var Node
     */
    private $parent;

    /**
     *
     * @var Node[]
     */
    private $children;
    
    /**
     * 
     * @param Node $child
     */
    public function adopt(Node $child)
    {
        $child->parent = $this;
        $this->children[] = $child;
    }
    
    /**
     * 
     * @return \HTML5\Node
     */
    public function getParent()
    {
        return $this->parent;
    }
    
    /**
     * 
     * @param Node $child
     * @return boolean
     */
    public function hasChild(Node $child)
    {
        return in_array($child, $this->children);
    }
}