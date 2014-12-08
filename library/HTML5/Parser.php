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
     * @return BuildableInterface[]
     */
    public function parse($string)
    {
        $elements = array();
        if (strpos($string, Document::DOCTYPE) === 0) {
            $document = $this->factory->createDocument();
            
            $children = $this->parse(substr($string, strlen(Document::DOCTYPE)));
            if (count($children) > 1) {
                throw new Exception\MultipleRootException();
            }
            
            if (!$children[0] instanceof Node\Element) {
                throw new Exception\NoRootException();
            } elseif ($children[0]->getName() !== 'html') {
                throw new Exception\InvalidRootException();
            }

            $document->addChild($children[0]);
            
            return $document;
            
        } elseif (preg_match_all('/\<(?<name>\w+)(?<attributes>(\s+\w+\=(\w+|"[^"]+"))*)(\s+\/>|>((?<innerHTML>.*))<\/\1>)?/', $string, $matches, PREG_SET_ORDER) < 1) {
            return array($this->factory->createText($string));
        }
        
        foreach ($matches as $match) {
            $element = $this->factory->createElement($match['name']);
            
            if (array_key_exists('attributes', $match)) {
                preg_match_all('/(?<identifier>\w+)\=(?<value>(\w+|"[^"]+"))/', $match['attributes'], $attributeMatches, PREG_SET_ORDER);
                foreach ($attributeMatches as $attributeMatch) {
                    $element->setAttributeString($attributeMatch['identifier'], trim($attributeMatch['value'], '"'));
                }
            }
            
            if (array_key_exists('innerHTML', $match)) {
                foreach ($this->parse($match['innerHTML']) as $child) {
                    $element->addChild($child);
                }
            }
            
            $elements[] = $element;
        }
        return $elements;
    }

}