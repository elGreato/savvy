<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 23.12.2017
 * Time: 19:19
 */

namespace http;


trait HTTPStatusHeader
{
    protected static function createHeader($statusCode = HTTPStatusCode::HTTP_200_OK, $statusPhrase = null)
    {
        if (null === $statusPhrase && isset($statusCode)) {
            $statusPhrase = $statusCode;
        }
        return sprintf('HTTP/1.1 %d %s', self::getStatusCodeNumber($statusCode), $statusPhrase);
    }
    protected static function getStatusCodeNumber($statusCode)
    {
        $class = new \ReflectionClass(__CLASS__);
        $constants = array_flip($class->getConstants());
        preg_match("/\d{3}/", $constants[$statusCode], $statusCodeNumber);
        return $statusCodeNumber[0];
    }
}