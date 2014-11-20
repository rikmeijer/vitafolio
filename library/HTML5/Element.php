<?php
namespace HTML5;

class Element
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
     * @var Element[]
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
    
    public function addChild(Element $child)
    {
        $this->children[] = $child;
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