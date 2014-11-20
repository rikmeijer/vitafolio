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
        return new Document();
    }
    
    /**
     * 
     * @return \HTML5\Document
     */
    public function createDocumentWithChildren(array $children)
    {
        return Document::withChildren($children);
    }
    
}