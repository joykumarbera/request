<?php

namespace Bera\Request\Core;

use Bera\Request\Core\BaseRequest;
use Bera\Request\Interfaces\RequestInterface;

class Get extends BaseRequest implements RequestInterface
{
    /**
     * @param string $url
     */
    public function __construct($url)
    {
        parent::__construct($url);
    }

    /**
     * grab url fire a get request
     * and return data
     * @return string
     */
    public function load()
    {
        curl_setopt($this->ch, CURLOPT_URL,  $this->url);
        curl_setopt($this->ch, CURLOPT_HEADER, 0);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($this->ch);
        return $data;
        $this->closeCurlHandle();
    }
}