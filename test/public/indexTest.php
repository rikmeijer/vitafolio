<?php

class indexTest extends PHPUnit_Extensions_Selenium2TestCase
{

    protected function setUp()
    {
        
        $this->setHost('localhost');
        $this->setPort(4444);
        $this->setBrowser('phantomjs');
        $this->setBrowserUrl('http://vitafolio.local/');
    }
    
	public function testHelloWorld()
	{
        $this->url('/');
		$this->assertEquals('Hello World!', $this->byTag('body')->text());
	}
	
}