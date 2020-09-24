<?php

namespace Bera\Request\Core;

use Bera\Request\Core\BaseRequest;
use Bera\Request\Interfaces\RequestInterface;

/**
 * get request class
 * 
 * @author Joy Kumar Bera <joykumarbera@gmail.com>
 */
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
     * return http response data
     * 
     * @return string
     */
    public function load()
    {
        $this->setCurlOptions(
            array(
                CURLOPT_HEADER => false,
            )
        );
        
        return $this->fireRequest();
    }
}