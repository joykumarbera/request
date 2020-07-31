<?php

namespace Bera\Request;

use Bera\Request\RequestFactory;
use Bera\Request\Helper\Util;

class Request
{
    /**
     * @var object $req
     */
    private $req;

    /**
     * @var string $data
     */
    private $data;

    /**
     * prepare a request for fire
     * 
     * @param string $type
     * @param string $url
     */
    public function __construct($type, $url)
    {
        $this->req = RequestFactory::create($type,$url);
    }

    /**
     * load the request
     */
    public function load()
    {
        $this->data = $this->req->load();
    }

    /**
     * return reponse data
     * 
     * @return string
     */
    public function response()
    {
        return $this->data;
    }

    /**
     * return data as json format
     * 
     * @return array
     */
    public function responseAsArray()
    {
        return Util::convertJsonToArray($this->data);
    }

    /**
     * @param string $name
     * @param mixed $arg
     * @return mixed
     */
    public function __call($name, $arg)
    {
        return \call_user_func_array(array($this->req,$name), $arg);
    }
}