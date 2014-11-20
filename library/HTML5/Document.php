<?php
namespace HTML5;

class Document implements BuildableInterface
{
    /**
     * 
     * @var Element
     */
    private $root;
    
    /**
     * 
     * @param Node\Element $child, ...
     */
    public function __construct(BuildableInterface $child)
    {
        $this->root = Node\Element::withChildren('html', array(
            new Node\Element('head'),
            Node\Element::withChildren('body', func_get_args())
        ));
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