<?php
namespace HTML5;

class Factory
{
    public function __construct(array $services)
    {
        
    }
    
    /**
     * 
     * @return \HTML5\Document
     */
    public function createDocument()
    {
        return new Document($this);
    }
    
    /**
     * 
     * @return \HTML5\Document
     */
    public function createDocumentWithChildren(array $children)
    {
        $element = $this->createDocument();
        foreach ($children as $child) {
            $element->addChild($child);
        }
        return $element;
    }


    /**
     *
     * @return \HTML5\Node\Element
     */
    public function createElement($name)
    {
        return new Node\Element($name);
    }
    
    /**
     * 
     * @param string $text
     * @return \HTML5\Node\Text
     */
    public function createText($text)
    {
        return new Node\Text($text);
    }
    

    /**
     *
     * @param string $text
     * @return \HTML5\Parser
     */
    public function createParser()
    {
        return new Parser($this);
    }
}