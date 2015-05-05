<?php

class buildTest extends PHPUnit_Framework_TestCase
{

    protected $pipes;

    protected $process;
    
    protected $root;

    protected function setUp()
    {
        $this->root = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'vitafolio';
        
        mkdir($this->root, 0755);
                
        $cmd = '/usr/bin/php ' . SRC_PATH . DIRECTORY_SEPARATOR . 'build.php ' . escapeshellarg($this->root);
        
        exec($cmd);
    }

    protected function tearDown()
    {        
        $this->rmdir($this->root);
    }
    
    protected function rmdir($directory) 
    {
        $dir = opendir($directory);
        while ($node = readdir($dir)) {
            if ($node === '..' || $node === '.') {
                continue;
            }
            
            $nodePath = $directory . DIRECTORY_SEPARATOR . $node;
            if (is_dir($nodePath)) {
                $this->rmdir($nodePath);
            } else {
                unlink($nodePath);
            }
        }
        closedir($dir);
        return rmdir($directory);
    }

    public function testBuiltHTMLFileContainsHTML5HelloWorld()
    {
        $this->assertFileExists($this->root . DIRECTORY_SEPARATOR . 'index.html');
        
        $this->assertContains("<!DOCTYPE html>", file_get_contents($this->root . DIRECTORY_SEPARATOR . 'index.html'));
    }
}