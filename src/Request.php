<?php

namespace Bera\Request;

use Bera\Request\RequestFactory;
use Bera\Request\Helper\Util;

/**
 * request class
 * 
 * @author Joy Kumar Bera <joykumarbera@gmail.com>
 */
class Request
{
    /**
     * @var object $req
     */
    private $req;

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
     * return reponse data
     * 
     * @return string
     */
    public function response()
    {
        return $this->req->load();
    }

    /**
     * return data as json format
     * 
     * @return array
     */
    public function responseAsArray()
    {
        return Util::convertJsonToArray(
            $this->req->load()
        );
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