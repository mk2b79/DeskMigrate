<?php

namespace API\Utilities;

use Psr\Http\Message\ResponseInterface;

class JsonDecode
{
    public static function Decode($json):array
    {
        return json_decode($json->getBody()->getContents(),true);
    }
}