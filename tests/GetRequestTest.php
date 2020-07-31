<?php

use PHPUnit\Framework\TestCase;
use Bera\Request\Request;

class GetRequestTest extends TestCase
{
    private $request;

    private $url = 'https://jsonplaceholder.typicode.com/posts';

    public function setUp(): void
    {
        $this->request = new Request(
            'GET',
            $this->url
        );
    }

    public function testCheckBeforeRequestDataIsNull()
    {
        $this->assertNull($this->request->response());
    }

    public function testAfterLoadCheckIfDataIsNotNull()
    {
        $this->request->load();
        $this->assertNotNull($this->request->response());
    }

    public function testResponseAsArray()
    {
        $this->request->load();
        $this->assertIsArray($this->request->responseAsArray());
    }
}