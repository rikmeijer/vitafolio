<?php
namespace HTML5;

class Document implements BuildableInterface, ContainableInterface
{
    /**
     * 
     * @var Node\Element
     */
    private $root;
    
    /**
     * 
     * @var Node\Element
     */
    private $head;

    /**
     *
     * @var Node\Element
     */
    private $body;
    
    /**
     * 
     * @param Node\Element $child, ...
     */
    public function __construct(Factory $factory)
    {
        $this->root = $factory->createElement('html');
        $this->head = $factory->createElement('head');
        $this->root->addChild($this->head);
        $this->body = $factory->createElement('body');
        $this->root->addChild($this->body);
    }
    
    /**
     * 
     * @param BuildableInterface $child
     */
    public function addChild(BuildableInterface $child)
    {
        return $this->body->addChild($child);
    }
    
    /**
     * 
     * @return string
     */
    public function build()
    {
        return '<!DOCTYPE html>' . PHP_EOL . $this->root->build();
    }

}