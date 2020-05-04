<?php

namespace Bera\Request;

use Bera\Request\Interfaces\RequestInterface;
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
     * @param RequestInterface $req
     */
    public function __construct(RequestInterface $req)
    {
        $this->req = $req;
        $this->data = $this->req->load();
    }

    /**
     * return reponse data
     * @return string
     */
    public function respone()
    {
        return $this->data;
    }

    /**
     * return data as json format
     * @return array
     */
    public function responeAsArray()
    {
        return Util::convertArrayFromJson($this->data);
    }
}