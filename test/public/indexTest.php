<?php

class indexTest extends PHPUnit_Framework_TestCase {
	
	public function testHelloWorld()
	{
		$this->expectOutputString('Hello World!');
		require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'index.php';
	}
	
}