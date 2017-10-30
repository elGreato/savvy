<?php
/**
 * Created by PhpStorm.
 * User: Area-51
 * Date: 10/30/2017
 * Time: 9:19 PM
 */
namespace router;
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
        self::route_auth($method, $path, null, $routeFunction);
    }
    public static function route_auth($method, $path, $authFunction, $routeFunction) {
        if(empty(self::$routes))
            self::init("/index.php");
        $path = trim($path, '/');
        self::$routes[$method][$path] = array("authFunction" => $authFunction, "routeFunction" => $routeFunction);
    }
    public static function call_route($method, $path, $errorFunction) {
        $path = trim(parse_url($path, PHP_URL_PATH), '/');
        if(!array_key_exists($method, self::$routes) || !array_key_exists($path, self::$routes[$method])) {
            $errorFunction(); return;
        }
        $route = self::$routes[$method][$path];
        if(isset($route["authFunction"])) {
            if (!$route["authFunction"]()) {
                return;
            }
        }
        $route["routeFunction"]();
    }
    public static function errorHeader() {
        header("HTTP/1.0 404 Not Found");
    }
    public static function redirect($redirect_path) {
        header("Location: " . $GLOBALS["ROOT_URL"] . $redirect_path);
    }
}