<?php

namespace Bera\Request\Core;

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
    public function __construct()
    {
        $this->ch = curl_init();
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
}