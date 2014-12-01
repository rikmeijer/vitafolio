<?php

class indexTest extends PHPUnit_Framework_TestCase
{

    protected $pipes;

    protected $process;

    protected function setUp()
    {
        $cmd = '/usr/bin/php ' . SRC_PATH . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'index.php';
        
        $descriptor = array(
            0 => array(
                'pipe',
                'r'
            ),
            1 => array(
                'pipe',
                'w'
            ),
            2 => array(
                'pipe',
                'r'
            )
        );
        
        $this->process = proc_open($cmd, $descriptor, $this->pipes);
    }

    protected function tearDown()
    {
        fclose($this->pipes[0]);
        fclose($this->pipes[1]);
        fclose($this->pipes[2]);
        
        proc_close($this->process);
    }

    public function testOutputContainsHTML5Doctype()
    {
        $this->assertEquals("<!DOCTYPE html>\n<html><head><body>Hello World!</body></html>", fread($this->pipes[1], 1024));
    }
}