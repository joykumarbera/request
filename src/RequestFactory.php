<?php

namespace Bera\Request;

use Bera\Request\Core\Get;
use Bera\Request\Core\Post;

class RequestFactory 
{
    /**
     * create request method by type
     * 
     * @param string $type
     * @param string $url
     * @return object
     */
    public static function create($type, $url)
    {
        switch($type)
        {
            case 'GET':
                $req = new Get($url);
            break;
            case 'POST':
                $req = new Post($url);
            break;
            default:
                $req = new Get($url);
            break;
        }
        return $req;
    }
}