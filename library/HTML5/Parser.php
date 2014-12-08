<?php
namespace HTML5;

class Parser
{
    /**
     * 
     * @var Factory
     */
    private $factory;
    
    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }
    
    /**
     * 
     * @param string $string
     * @return BuildableInterface
     */
    public function parse($string)
    {
        if (preg_match('/\<(?<name>\w+)/', $string, $matches) === 1) {
            $element = $this->factory->createElement($matches['name']);
        }
        
        if (strpos($string, 'attr1')) {
            $element->setAttributeString('attr1', 'val1');
        }
        
        return $element;
    }

}