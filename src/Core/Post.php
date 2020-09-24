<?php

namespace Bera\Request\Core;

use Bera\Request\Core\BaseRequest;
use Bera\Request\Interfaces\RequestInterface;
use Bera\Request\Interfaces\PostInterface;
use Bera\Request\Helper\Util;

class Post extends BaseRequest implements RequestInterface, PostInterface
{
    /**
     * @var array $payload
     */
    private $payload = [];
    
    /**
     * @param string $url
     */
    public function __construct($url)
    {
        parent::__construct($url);
    }

    /**
     * add request payload body
     * 
     * @param array $payload
     * @throws InvalidArgumentException
     */
    public function attachPayLoad( $payload )
    {
        if(!\is_array($payload))
            throw new \InvalidArgumentException('payload must be an array');

        $this->payload = $payload;
    }

    /**
     * return http response data
     * 
     * @return string
     */
    public function load()
    {
        $payload = Util::convertArrayToJson($this->payload);
        $this->setCurlOptions(
            array(
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $payload,
                CURLOPT_HTTPHEADER => array(                                                                          
                    'Content-Type: application/json',                                                                                
                    'Content-Length: ' . strlen($payload)
                )  
            )
        );  
        
        return $this->fireRequest();
    }
}