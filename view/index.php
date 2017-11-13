<?php
require_once "welcome.php";
 require_once"footer.php";
 use router\Router;
 require_once "router/Router.php";

Router::route_auth("GET", "/", $authFunction, function () {
    global $topics;
    $topics = (new TopicsService())->findAllTopics();
    layoutSetContent("main.php");
});?>