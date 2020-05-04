<?php

namespace Bera\Request\Core;

use Bera\Request\Core\BaseRequest;
use Bera\Request\Interfaces\RequestInterface;
use Bera\Request\Exceptions\BadUrlException;
use Bera\Request\Helper\Util;

class Get extends BaseRequest implements RequestInterface
{
    /**
     * @var string $url
     */
    public function __construct($url)
    {
        $this->setUrl($url);
        parent::__construct();
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        if(Util::isValidUrl($url) === false) 
            throw new BadUrlException($url . ' is not a valid url');
        $this->url = $url;
    }

    /**
     * grab url fire request
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
    }
}