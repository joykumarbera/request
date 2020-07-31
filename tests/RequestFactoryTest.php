<?php

use PHPUnit\Framework\TestCase;

use Bera\Request\Core\Get;
use Bera\Request\Core\Post;
use Bera\Request\RequestFactory;

class SimpleTest extends TestCase
{
    private $url;

    public function setUp(): void
    {
        $this->url = 'http://example.com';
    }

    public function testIsGetInstance()
    {
        $this->assertInstanceOf(Get::class, RequestFactory::create('GET',$this->url));
        $this->assertNotInstanceOf(Get::class,RequestFactory::create('POST',$this->url) );
    }

    public function testIsPostInstance()
    {
        $this->assertInstanceOf(Post::class, RequestFactory::create('POST',$this->url));
        $this->assertNotInstanceOf(Post::class,RequestFactory::create('GET',$this->url) );
    }
}