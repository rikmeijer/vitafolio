<?php

class indexTest extends PHPUnit_Framework_TestCase
{

    public function testIndexReturnsClosure()
    {
        $return = require SRC_PATH . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'index.php';
        
        $this->assertTrue($return instanceof Closure);
    }
}