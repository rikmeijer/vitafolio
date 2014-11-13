<?php
namespace HTML;

class Element
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
        
    }
    
    public function build()
    {
        return '<' . $this->name . '></' . $this->name . '>';
    }
}