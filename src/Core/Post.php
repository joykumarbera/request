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
        curl_setopt($this->ch, CURLOPT_URL,$this->url);
        curl_setopt($this->ch, CURLOPT_POST, true);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS,$data_in_json);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($this->ch, CURLOPT_HTTPHEADER, array(                                                                          
                    'Content-Type: application/json',                                                                                
                    'Content-Length: ' . strlen($data_in_json)
                )                                                                       
            );
             
        $data = curl_exec($this->ch);
        $this->closeCurlHandle();
        return $data;
    }
}