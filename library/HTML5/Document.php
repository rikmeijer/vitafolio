<?php
namespace HTML5;

class Document implements BuildableInterface
{
    /**
     * 
     * @var Element
     */
    private $head;

    /**
     *
     * @var Element
     */
    private $body;
    
    /**
     * 
     * @param Node\Element $child, ...
     */
    public function __construct(BuildableInterface $child)
    {
        $this->head = new Node\Element('head');
        $this->body = Node\Element::withChildren('body', func_get_args());
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