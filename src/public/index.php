<?php
return function(array $services)  {
    $document = $services['library']['HTML5']()->createDocumentWithChildren(array(
        new HTML5\Node\Text('Hello World!')
    ));
        
    return $services['filewriter'](DIRECTORY_SEPARATOR . 'index.html', $document->build());
};