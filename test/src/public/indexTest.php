<?php

class indexTest extends PHPUnit_Framework_TestCase
{

    public function testIndexReturnsClosure()
    {
        $return = require SRC_PATH . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'index.php';
        
        $this->assertTrue($return instanceof Closure);


        $pathActual = null;
        $contentsActual = null;
        $services = array(
            'filewriter' => function($path, $contents) use (&$pathActual, &$contentsActual) {
                $pathActual = $path;
                $contentsActual = $contents;
                return 0;
            },
            'library' => array(
                'HTML5' => function () use(&$services)
                {
                    return new HTML5\Factory($services);
                }
            )
        );
        
        $this->assertEquals(0, $return($services));

        $this->assertEquals(DIRECTORY_SEPARATOR . 'index.html', $pathActual);
        $this->assertEquals("<!DOCTYPE html>\n<html><head><body style=\"font-family:Arial, sans-serif;\">Hello World!</body></html>", $contentsActual);
    }
}