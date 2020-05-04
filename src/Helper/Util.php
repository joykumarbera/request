<?php

namespace Bera\Request\Helper;

use Bera\Request\Exceptions\NotAstringException;

class Util
{
    public static function convertArrayFromJson($data)
    {
        if(!is_string($data)) 
            throw new NotAstringException($data . ' is not a sting');
        return \json_decode($data,true);
    }

    /**
     * check if a given url is valid or not
     * @param string $url
     * @return bool
     */
    public static function isValidUrl($url)
    {
        if(filter_var($url,FILTER_VALIDATE_URL) === false) 
            return false;
        return true;
    }
}