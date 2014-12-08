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
        if (preg_match('/\<(?<name>\w+)(?<attributes>(\s+\w+\=(\w+|"[^"]+"))*)/', $string, $matches) === 1) {
            $element = $this->factory->createElement($matches['name']);
        }
        
        if (array_key_exists('attributes', $matches)) {
            preg_match_all('/(?<identifier>\w+)\=(?<value>(\w+|"[^"]+"))/', $matches['attributes'], $attributeMatches, PREG_SET_ORDER);
            foreach ($attributeMatches as $attributeMatch) {
                $element->setAttributeString($attributeMatch['identifier'], trim($attributeMatch['value'], '"'));
            }
        }
        
        return $element;
    }

}