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
        $this->head = $this->root->addChild($factory->createElement('head'));
        $this->body = $this->root->addChild($factory->createElement('body'));
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
     * @param array $styles
     */
    public function setStyles(array $styles)
    {
        return $this->body->setStyles($styles);
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