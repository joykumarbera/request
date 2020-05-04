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
}