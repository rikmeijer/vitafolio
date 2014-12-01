<?php
return function(array $services)  {
    $document = $services['library']['HTML5']()->createDocumentWithChildren(array(
        $services['library']['HTML5']()->createText('Hello World!')
    ));
        
    return $services['filewriter'](DIRECTORY_SEPARATOR . 'index.html', $document->build());
};