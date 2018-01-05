<?php
/**
 * Created by PhpStorm.
 * User: Area-51
 * Date: 10/30/2017
 * Time: 9:19 PM
 */
namespace router;
use http\HTTPException;
use http\HTTPStatusCode;
class Router
{
    protected static $routes = [];
    public static function init($indexFileName){
        $GLOBALS["ROOT_URL"] = str_replace($indexFileName,"",$_SERVER['PHP_SELF']);
        if(!empty($_SERVER['REDIRECT_ORIGINAL_PATH'])) {
            $_SERVER['PATH_INFO'] = $_SERVER['REDIRECT_ORIGINAL_PATH'];
        }
        else {
            $_SERVER['PATH_INFO'] = "/";
        }
    }
    public static function route($method, $path, $routeFunction) {
        if(empty(self::$routes))
            self::init("/index.php");
        $path = trim($path, '/');
        self::$routes[$method][$path] = array("routeFunction" => $routeFunction);
    }
    public static function call_route($method, $path) {

        $path = trim(parse_url($path, PHP_URL_PATH), '/');
        $path_pieces = explode('/', $path);
        $parameters = [];
        $parameter_number = 0;
        foreach($path_pieces as $path_value) {
            if(is_numeric($path_value)) {
                $parameters[$parameter_number] = $path_value;
                $path = str_replace("/".$path_value,"/"."{parameter" . $parameter_number++ . "}",$path);
            }
        }
        if(!array_key_exists($method, self::$routes) || !array_key_exists($path, self::$routes[$method])) {
            throw new HTTPException(HTTPStatusCode::HTTP_404_NOT_FOUND);

        }

        $route = self::$routes[$method][$path];




        $route["routeFunction"](...$parameters);
    }
    public static function errorHeader() {
        header("HTTP/1.0 404 Not Found");
    }
    public static function redirect($redirect_path) {
        header("Location: " . $GLOBALS["ROOT_URL"] . $redirect_path);
    }

}