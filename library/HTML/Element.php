<?php
namespace HTML;

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
    
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    public function setAttributeString($identifier, $value)
    {
        $this->attributes[$identifier] = $identifier  . '="' . $value . '"';
    }
    
    public function setAttributeArray($identifier, array $value)
    {
        $this->attributes[$identifier] = $identifier  . '="' . join(' ', $value) . '"';
    }
    
    public function build()
    {
        return '<' . $this->name . (count($this->attributes) > 0 ? ' ' . join(' ', $this->attributes) : '') . '></' . $this->name . '>';
    }
}