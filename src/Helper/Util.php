<?php

namespace Bera\Request\Helper;

use Bera\Request\Exceptions\NotAstringException;

class Util
{
    /**
     * @param string $data
     * @return array
     */
    public static function convertArrayFromJson($data)
    {
        if(!is_string($data)) 
            throw new NotAstringException($data . ' is not a sting');
        return \json_decode($data,true);
    }

    /**
     * @param array $data
     * @return string
     */
    public static function convertArrayToJson($data)
    {
        if(!\is_array($data))
            throw new \InvalidArgumentException( $data .' is not an array');
        return \json_encode($data);
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