<?php
namespace HTML5;

class Node
{
    /**
     * 
     * @var ContainableInterface
     */
    protected $parent;
    
    /**
     * 
     * @param ContainableInterface $parent
     */
    public function adopt(ContainableInterface $parent)
    {
        $this->parent = $parent;
    }
    
    /**
     * @param ContainableInterface $parent
     * @return \HTML5\Node
     */
    public function hasParent(ContainableInterface $parent)
    {
        return $this->parent === $parent;
    }
}