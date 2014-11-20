<?php
namespace HTML5\Node;

class Text extends \HTML5\Node implements \HTML5\BuildableInterface
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