<?php
return function(array $services, Closure $builder)  {
    $document = $services['library']['HTML5']()->createDocumentWithChildren(array(
        new HTML5\Node\Text('Hello World!')
    ));
    
    $services['filewriter'](DIRECTORY_SEPARATOR . 'index.html', $document->build());
    
    return $document;
};