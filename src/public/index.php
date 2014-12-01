<?php
return function(array $services)  {
    return $services['library']['HTML5']()->createDocumentWithChildren(array(
        new HTML5\Node\Text('Hello World!')
    ));
};