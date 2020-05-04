<?php

namespace Bera\Request\Core;

use Bera\Request\Exceptions\BadUrlException;
use Bera\Request\Helper\Util;

class BaseRequest 
{
    /**
     * @var string $url
     */
    protected $url;

    /**
     * @var $ch
     */
    protected $ch;

    /**
     * @var string $url
     */
    public function __construct($url)
    {
        $this->ch = curl_init();
        $this->setUrl($url);
    }
    
    /**
     * open a curl handle
     */
    protected function openCurlHandle()
    {
        if(is_null($this->ch))
            $this->ch = curl_init();
    }

    /**
     * close a curl handle
     */
    protected function closeCurlHandle()
    {
        if(!is_null($this->ch))
            \curl_close($this->ch);
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
}