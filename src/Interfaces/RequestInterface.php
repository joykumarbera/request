<?php

namespace Bera\Request\Interfaces;

interface RequestInterface
{
    /**
     * load the request and
     * fetch the data
     */
    public function load();
}