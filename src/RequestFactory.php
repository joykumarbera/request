<?php

namespace Bera\Request;

use Bera\Request\Core\Get;
use Bera\Request\Core\Post;

/**
 * request factory class
 * 
 * @author Joy Kumar Bera <joykumarbera@gmail.com>
 */
class RequestFactory 
{
    /**
     * create request method by type
     * 
     * @param string $type
     * @param string $url
     * @return object
     * @throws Exception
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
                throw new \Exception('unknown request method '. $type);
            break;
        }
        return $req;
    }
}