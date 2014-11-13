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
     * @return string
     */
    public function build()
    {
        return '<' . $this->name . (count($this->attributes) > 0 ? ' ' . join(' ', $this->attributes) : '') . '></' . $this->name . '>';
    }
}