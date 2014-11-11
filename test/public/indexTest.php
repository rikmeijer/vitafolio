<?php

class indexTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        $this->setBrowserUrl(PHPUNIT_TESTSUITE_EXTENSION_SELENIUM_BASEURL);
    }
    
	public function testHelloWorld()
	{
        $this->url('/');
		$this->assertEquals('Hello World!', $this->byTag('body')->text());
	}
	
}