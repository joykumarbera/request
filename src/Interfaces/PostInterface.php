<?php

namespace Bera\Request\Interfaces;

interface PostInterface
{
    /**
     * attach payload with the request
     * 
     * @param array $data
     */
    public function attachPayLoad($data);
}