<?php
namespace HTML5;

class Text
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
        return $this->text;
    }
}