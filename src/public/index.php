<?php
return function(array $services)  {
    $html5Factory = $services['library']['HTML5'](); 
    $document = $html5Factory->createDocumentWithChildren(array(
        $html5Factory->createText('Hello World!')
    ));
        
    return $services['filewriter'](DIRECTORY_SEPARATOR . 'index.html', $document->build());
};