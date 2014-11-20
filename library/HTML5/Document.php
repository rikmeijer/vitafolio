<?php
namespace HTML5;

class Document implements BuildableInterface
{
    /**
     * 
     * @var Element
     */
    private $root;
    
    public function __construct(Node\Element $root)
    {
        $this->root = $root;
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