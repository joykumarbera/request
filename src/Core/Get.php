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
        $this->setCurlOptions(
            array(
                CURLOPT_URL => $this->url,
                CURLOPT_HEADER => 0,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false
            )
        );
        return $this->fireRequest();
    }
}