<?php
namespace HTML5;

class Document implements BuildableInterface, ContainableInterface, StylableInterface
{
    const DOCTYPE = '<!DOCTYPE html>';
    
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
        if ($child instanceof Node\Element) {
            switch ($child->getName()) {
                case 'html':
                    $this->root = $child;
                    return $child;
            }
        }
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
        return self::DOCTYPE . PHP_EOL . $this->root->build();
    }

}