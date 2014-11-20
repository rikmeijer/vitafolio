<?php
namespace HTML5;

class Text extends Node implements BuildableInterface
{
    /**
     * 
     * @var string
     */
    private $text;
    
    public function __construct($text)
    {
        $this->text = $text;
    }
    
    /**
     * 
     * @return string
     */
    public function build()
    {
        return htmlentities($this->text, ENT_COMPAT, 'UTF-8');
    }
}