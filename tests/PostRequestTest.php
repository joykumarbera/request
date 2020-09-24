<?php


use PHPUnit\Framework\TestCase;
use Bera\Request\Request;

class PostRequestTest extends TestCase
{
    private $request;

    private $url = 'https://jsonplaceholder.typicode.com/posts';

    private $payload = array(
                    'title' => 'foo',
                    'body' => 'bar',
                    'userId' => 1
                );

    public function setUp(): void
    {
        $this->request = new Request(
            'POST',
            $this->url
        );
        $this->request->attachPayLoad($this->payload);
    }
    
    public function testAfterLoadCheckIfDataIsNotNull()
    {
        $this->assertNotNull($this->request->response());
    }

    public function testResponseAsArray()
    {
        $responseData = $this->request->responseAsArray();
        $this->assertIsArray($responseData);
        $this->assertEquals(
            [
                'title' => 'foo',
                'body' => 'bar',
                'userId' => 1,
                'id' => 101
            ],
            $responseData
        );
    }
}