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
     * @param Node $parent
     * @return \HTML5\Node
     */
    public function hasParent(Node $parent)
    {
        return $this->parent === $parent;
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