<?php

use PHPUnit\Framework\TestCase;
use Bera\Request\Core\BaseRequest;
use Bera\Request\Exceptions\BadUrlException;

class BaseRequestTest extends TestCase
{

    private $url = 'http://example.com';

    private $base_request;

    public function setUp(): void 
    {
        $this->base_request = new BaseRequest($this->url);
    }

    public function testRightSetUrl()
    {
        $base_request_url = $this->getObjectProperty(
            BaseRequest::class, 'url'
        );
        $this->assertEquals(
            $base_request_url->getValue($this->base_request), $this->url
        );
    }

    public function testWrongSetUrl()
    {
        $this->expectException(BadUrlException::class);
        $this->url = 'example.com';
        $this->base_request = new BaseRequest($this->url);
        $base_request_url = $this->getObjectProperty(
            BaseRequest::class, 'url'
        );
        $this->assertNotEquals(
            $base_request_url->getValue($this->base_request), $this->url
        );
    }
    
    /**
     * helper method to
     * access private or procted property 
     * 
     * @param string $class_name
     * @param string $property_name
     * @return	ReflectionProperty
     */
    public function getObjectProperty($class_name, $property_name)
    {
        $reflector = new ReflectionClass( $class_name );
		$property = $reflector->getProperty( $property_name );
		$property->setAccessible( true );
		return $property;
    }

    /**
     * helper method to 
     * access private or procte method from the class
     * 
     * @param string $class_name
     * @param string $method_name
     * @return	ReflectionMethod
     */
    public function getObjectMethod( $class_name, $method_name ) {
		$reflector = new ReflectionClass( $class_name );
		$method = $reflector->getMethod( $method_name );
		$method->setAccessible( true );

		return $method;
	}
 
}