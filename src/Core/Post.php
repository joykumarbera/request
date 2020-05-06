<?php

namespace Bera\Request\Core;

use Bera\Request\Core\BaseRequest;
use Bera\Request\Interfaces\RequestInterface;
use Bera\Request\Helper\Util;

class Post extends BaseRequest implements RequestInterface
{
    /**
     * @var array $payload
     */
    private $payload = [];
    
    /**
     * @param string $url
     * @param array $payload
     */
    public function __construct($url, $payload=[])
    {
        parent::__construct($url);
        $this->attachPayLoad($payload);
    }

    /**
     * @param array $payload
     */
    public function attachPayLoad( $payload )
    {
        if(!\is_array($payload))
            throw new \Exception('payload must be an array');
        $this->payload = $payload;
    }

    /**
     * grab url fire a post request
     * and return data
     * @return string
     */
    public function load()
    {
        $data_in_json = Util::convertArrayToJson($this->payload);
        $this->setCurlOptions(
            array(
                CURLOPT_URL => $this->url,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $data_in_json,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array(                                                                          
                    'Content-Type: application/json',                                                                                
                    'Content-Length: ' . strlen($data_in_json)
                )  
            )
        );  
        return $this->fireRequest();
    }
}