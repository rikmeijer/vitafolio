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
            $children = $this->parse(trim(substr($string, strlen(Document::DOCTYPE)))); //skip newline
            if (count($children) > 1) {
                return $document;
            } elseif (!$children[0] instanceof Node\Element) {
                return $document;
            } elseif ($children[0]->getName() !== 'html') {
                return $document;
            }
            $document->addChild($children[0]);
            return $document;
        }
        
        
        $innerHTML = '';
        $currentTag = array();
        $element = null;
        // <html>cont<span>en</span>ts</html>
        while (strlen($string) > 0) {
            if (strpos($string, '<') === false) {
                $elements[] = $this->factory->createText($string);
                break;
            }
            
            // find next occurence of <
            list($buffer, $string) = explode('<', $string, 2);
            $innerHTML .= $buffer;
            
            // see if it is open/close tag
            if (substr($string, 0, 1) === '/') {
                // close tag
                list($tag, $string) = explode('>', substr($string, 1), 2);
                

                if (count($currentTag) === 0) {
                    // unexpected end tag
                    $innerHTML .= '</' . $tag . '>';
                    continue;
                } 
                

                $currentTagIdentifier = array_pop($currentTag);
                if (count($currentTag) > 0) {
                    // nested, part of innerHTML
                    $innerHTML .= '</' . $currentTagIdentifier . '>';
                } elseif ($tag !== $currentTagIdentifier) {
                    $innerHTML .= '</' . $tag . ' ' . $currentTagIdentifier . ' b>';
                    
                } else {
                    foreach ($this->parse($innerHTML) as $child) {
                        $element->addChild($child);
                    }
                    $elements[] = $element;
                    unset($element);
                    $innerHTML = '';
                }
                continue;
               
            } 

            // open tag
            list($tag, $string) = explode('>', $string, 2);
                          
            if (strpos($tag, ' ') === false) {
                $attributesUnparsed = '';
            } else {
                list($tag, $attributesUnparsed) = explode(' ', $tag, 2);
            }
            
            $closedElement = substr($attributesUnparsed, -1) === '/';
            
            if ($closedElement) {
                $attributesUnparsed = substr($attributesUnparsed, 0, -1);
            } else {
                $currentTag[] = $tag;
            }


            if (isset($element)) {
                $innerHTML .= '<' . trim($tag . ' ' . $attributesUnparsed) . ($closedElement ? ' /' : '') . '>';
                continue;
            }
            
            $element = $this->factory->createElement($tag);
            
            // read attributes
            
            while (strlen($attributesUnparsed) > 0) {
                if (strpos($attributesUnparsed, '=') === false) {
                    break;
                }
                
                list($identifier, $attributesUnparsed) = explode('=', $attributesUnparsed, 2);
                $identifier = trim($identifier);
                if (substr($attributesUnparsed, 0, 1) === '"') {
                    list($value, $attributesUnparsed) = explode('"', substr($attributesUnparsed, 1), 2);
                } else {
                    list($value, $attributesUnparsed) = explode(' ', $attributesUnparsed, 2);
                }
                
                $element->setAttributeString($identifier, $value);
            }
            
            if ($closedElement) {
                $elements[] = $element;
                unset($element);
                $innerHTML = '';
                break;
            }
        }

        if (count($elements) === 0) {
            $elements[] = $this->factory->createText($string);
        }
        
        return $elements;
    }

}