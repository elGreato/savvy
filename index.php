<?php
require_once "router/Router.php";
require_once "view/welcome.php";
 require_once "view/footer.php";
 use router\Router;


Router::route_auth("GET", "/", $authFunction, function () {
    global $topics;
    $topics = (new TopicsService())->findAllTopics();
    layoutSetContent("main.php");
});?>