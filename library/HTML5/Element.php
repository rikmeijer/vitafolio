<?php
namespace HTML5;

class Element extends Node implements BuildableInterface
{
    /**
     * 
     * @var string
     */
    private $name;
    
    /**
     * 
     * @var array
     */
    private $attributes = array();
    
    /**
     * 
     * @var BuildableInterface[]
     */
    private $children = array();
    
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    /**
     * 
     * @param string $name
     * @param Element[] $children
     * @return \HTML5\Element
     */
    static function withChildren($name, array $children)
    {
        $element = new self($name);
        $element->children = $children;
        return $element;
    }
    
    /**
     * 
     * @param string $identifier
     * @param string $value
     */
    public function setAttributeString($identifier, $value)
    {
        $this->attributes[$identifier] = $identifier  . '="' . $value . '"';
    }
    
    /**
     * 
     * @param string $identifier
     * @param array $value
     */
    public function setAttributeArray($identifier, array $value)
    {
        $this->attributes[$identifier] = $identifier  . '="' . join(' ', $value) . '"';
    }
    
    /**
     * 
     * @param BuildableInterface $child
     */
    public function addChild(BuildableInterface $child)
    {
        $this->children[] = $child;
        $child->adopt($this);
    }
    
    /**
     * 
     * @return string
     */
    public function build()
    {
        $html = '<' . $this->name . (count($this->attributes) > 0 ? ' ' . join(' ', $this->attributes) : '') . '>';
        if (count($this->children) > 0) {
            foreach ($this->children as $child) {
                $html .= $child->build();
            }
            $html .= '</' . $this->name . '>';
        }
        return $html;
    }
}