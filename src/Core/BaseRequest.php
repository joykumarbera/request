<?php

namespace Bera\Request\Core;

use Bera\Request\Exceptions\BadUrlException;
use Bera\Request\Helper\Util;

/**
 * base request class
 * 
 * @author Joy Kumar Bera <joykumarbera@gmail.com>
 */
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
     * curl option array
     * 
     * @var array $curl_options
     */
    protected $curl_options = array();

    /**
     * @var $response_header
     */
    protected $response_header;

    /**
     * @var string $status_code
     */
    protected $status_code;

    /**
     * @var string $curl_error
     */
    protected $curl_error;

    /**
     * @var string $url
     */
    public function __construct($url)
    {
        $this->setUrl($url);
        $this->openCurlHandle();
        $this->setdefaultCurlOptions();
    }

    /**
     * set curl options
     * 
     * @param array $options
     */
    protected function setCurlOptions($options)
    {
        if(!empty($options))
        {
            $this->curl_options = $this->curl_options + (array) $options;
        }
        if(curl_setopt_array($this->ch, $this->curl_options) === false)
        {
            throw new \Exception('option not set properly');
        }
    }

    /**
     * set curl defualt options
     */
    protected function setdefaultCurlOptions()
    {
        $this->curl_options = array(
            CURLOPT_URL => $this->url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false
        );
    }
    
    /**
     * @param string $error
     */
    protected function setCurlError($error)
    {
        $this->curl_error = $error;
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
     * set url
     * 
     * @param string $url
     * @throws BadUrlException
     */
    public function setUrl($url)
    {
        if(Util::isValidUrl($url) === false) 
            throw new BadUrlException($url . ' is not a valid url');
            
        $this->url = $url;
    }

    /**
     * fetch a curl  reqeust
     * 
     * @return string
     */
    protected function fireRequest()
    {
        $data = \curl_exec($this->ch);
        $this->setCurlError($this->ch);
        $this->closeCurlHandle();

        return $data;
    }
}