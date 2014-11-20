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
}