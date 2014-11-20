<?php
namespace HTML5;

interface ContainableInterface
{    
    /**
     * @param BuildableInterface $child
     */
    public function addChild(BuildableInterface $child);
}