<?php
return function(array $services)  {
    $html5Factory = $services['library']['HTML5'](); 
    $document = $html5Factory->createParser()->parse($services['template']('default.html'));
    
    $document->setStyles(array(
       'font-family' => 'Arial, sans-serif' 
    ));
        
    return $services['filewriter'](DIRECTORY_SEPARATOR . 'index.html', $document->build());
};