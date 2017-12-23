<?php

/**
 * Created by PhpStorm.
 * User: Area-51
 * Date: 11/12/2017
 * Time: 3:49 PM
 */
namespace http;
class HTTPHeader implements HTTPStatusCode
{
    use HTTPStatusHeader;
    public static function getHeader($statusCode = HTTPStatusCode::HTTP_200_OK, $replaceHeader = true, $statusPhrase = null){
        header(self::createHeader($statusCode, $statusPhrase), $replaceHeader, self::getStatusCodeNumber($statusCode));
    }
    public static function redirect($redirect_path, $statusCode = HTTPStatusCode::HTTP_301_MOVED_PERMANENTLY) {
        header("Location: " . $GLOBALS["ROOT_URL"] . $redirect_path, true, self::getStatusCodeNumber($statusCode));
        exit;
    }
}