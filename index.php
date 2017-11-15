<?php


use router\Router;
require_once("config/Autoloader.php");
require_once 'view/welcome.php';
require_once 'view/footer.php';



Router::route_auth("GET", "/", $authFunction, function () {
    global $topics;
    $topics = (new TopicsService())->findAllTopics();
    layoutSetContent("main.php");
});?>