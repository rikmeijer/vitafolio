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
    public function __construct()
    {
        $this->head = new Node\Element('head');
        $this->body = Node\Element::withChildren('body', func_get_args());
    }
    
     /* (non-PHPdoc)
      * @see \HTML5\ContainableInterface::withChildren()
      */
     static function withChildren(array $children)
     {
        $element = new self();
        foreach ($children as $child) {
            $element->addChild($child);
        }
        return $element;
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