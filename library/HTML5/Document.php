<?php
namespace HTML5;

class Document implements BuildableInterface, ContainableInterface
{
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
        $this->head = $factory->createElement('head');
        $this->body = $factory->createElement('body');
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
        return '<!DOCTYPE html>' . PHP_EOL . Node\Element::withChildren('html', array(
            $this->head,
            $this->body
        ))->build();
    }

}