<?php


use router\Router;
use services\ModuleServiceImpl;
use controller\StudentController;
use controller\AuthController;
session_start();
require_once("config/Autoloader.php");
/*require_once 'view/welcome.php';
require_once 'view/footer.php';*/


$authFunction = function () {
   /* if (AuthController::authenticate())
        return true;
    Router::redirect("/login");
    return false;*/
};

Router::route_auth("GET", "/", $authFunction, function () {
    require_once("view/welcome.php");
    global $module;
    $module = (new ModuleServiceImpl())->readAllModules();

});
Router::route_auth("GET", "/login", $authFunction, function () {
    require_once("view/login.php");

});
Router::route_auth("POST", "/login", $authFunction, function () {
    require_once("view/login.php");

});
Router::route_auth("GET", "/register", $authFunction, function () {
    require_once("view/register.php");

});
Router::route_auth("POST", "/register", $authFunction, function () {
    require_once("view/register.php");

});
try {
    Router::call_route($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO']);
} catch (HTTPException $exception) {
    $exception->getHeader();
    ErrorController::show404();
}
?>