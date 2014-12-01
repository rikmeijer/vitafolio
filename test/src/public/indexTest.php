<?php

class indexTest extends PHPUnit_Framework_TestCase
{

    public function testIndexReturnsClosure()
    {
        $return = require SRC_PATH . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'index.php';
        
        $this->assertTrue($return instanceof Closure);
        
        $services = array(
            'library' => array(
                'HTML5' => function () use(&$services)
                {
                    return new HTML5\Factory($services);
                }
            )
        );
        
        $document = $return($services);
        $this->assertTrue($document instanceof HTML5\Document);

        $this->assertEquals("<!DOCTYPE html>\n<html><head><body>Hello World!</body></html>", $document->build());
    }
}