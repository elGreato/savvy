<?php


use router\Router;
use services\ModuleServiceImpl;
use controller\StudentController;
use controller\AuthController;
use controller\ModuleController;
use controller\ContactUsController;
use controller\ModelContentController;
use controller\MyModulesController;
use controller\PdfController;
use view\TemplateView;
use controller\CommentController;
session_start();
require_once("config/Autoloader.php");
/*require_once 'view/welcome.php';
require_once 'view/footer.php';*/


$authFunction = function () {
   if (AuthController::authenticate())
        return true;
    Router::redirect("/login");
    return false;
};

Router::route_auth("GET", "/", $authFunction, function () {
    if(AuthController::authenticate())
    {
        Router::redirect("/main");
    }
    else{
        require_once("view/welcome.php");
    }


});

Router::route_auth("GET", "/login", $authFunction, function () {
    $view = new TemplateView("view/login.php");
    echo $view->createView();

});
Router::route_auth("GET", "/contactus", $authFunction, function () {
    require_once("view/contactUs.php");

});
Router::route_auth("POST", "/login", $authFunction, function () {
    AuthController::login();

});
Router::route_auth("POST", "/contactus", true, function () {
    ContactUsController::handleContactUs();

});
Router::route_auth("GET", "/logout", $authFunction, function () {
    if(AuthController::authenticate()) {
        AuthController::logout();

    }
    Router::redirect("/login");

});
Router::route_auth("GET", "/myprofile", $authFunction, function () {
    if(AuthController::authenticate())
    {
        StudentController::showMyProfile();
    }
    else{
        Router::redirect("/login");
    }

});
Router::route_auth("GET", "/pdfContent", $authFunction, function () {
    if(AuthController::authenticate())
    {
        PdfController::startPdf();
    }
    else{
        Router::redirect("/login");
    }

});
Router::route_auth("POST", "/myprofile", $authFunction, function () {
    if(AuthController::authenticate())
    {
        StudentController::changePassword();
    }
    else{
        Router::redirect("/login");
    }

});
Router::route_auth("GET", "/passwordreset", $authFunction, function () {
    StudentController::showPasswordReset();
});
Router::route_auth("POST", "/passwordreset", $authFunction, function () {
    StudentController::resetPassword();
});
Router::route_auth("GET", "/passwordreset/successful", $authFunction, function () {
    StudentController::requestSent();
});
Router::route_auth("GET", "/passwordreset/reset", $authFunction, function () {
    StudentController::showNewPassword();
});
Router::route_auth("POST", "/passwordreset/reset", $authFunction, function () {
    StudentController::confirmNewPassword();
});
Router::route_auth("GET", "/module", $authFunction, function () {
    if (AuthController::authenticate())
    ModelContentController::handleModule();
    else{
        Router::redirect("/login");
    }

});
Router::route_auth("GET", "/register", $authFunction, function () {
    $view = new TemplateView("view/register.php");
    echo $view->createView();

});
Router::route_auth("POST", "/register", $authFunction, function () {
   StudentController::register();

});
Router::route_auth("POST", "/saveComment", $authFunction, function () {
    if (AuthController::authenticate())
    CommentController::saveComment();
    else{
        Router::redirect("/login");
    }

});
Router::route_auth("POST", "/editComment", $authFunction, function () {
    if (AuthController::authenticate())
        CommentController::editComment();
    else{
        Router::redirect("/login");
    }

});
Router::route_auth("POST", "/myModules", $authFunction, function () {
    if (AuthController::authenticate())
        myModulesController::handleSelectedModules();
    else{
        Router::redirect("/login");
    }

});
Router::route_auth("GET", "/deleteComment", $authFunction, function () {
    if (AuthController::authenticate())
        CommentController::deleteComment();
    else{
        Router::redirect("/login");
    }

});
Router::route_auth("GET", "/upvote", $authFunction, function () {
    if (AuthController::authenticate())
        CommentController::upvote();
    else{
        Router::redirect("/login");
    }

});
Router::route_auth("GET", "/main/addmodule", $authFunction, function () {
    if(AuthController::authenticate())
    {
        ModuleController::showAddModule();
    }
    else{
        Router::redirect("/login");
    }
});
Router::route_auth("GET", "/main/deletemodule", $authFunction, function () {
    if(AuthController::authenticate())
    {
        ModuleController::deleteModule();
    }
    else{
        Router::redirect("/login");
    }

});
Router::route_auth("GET", "/main/editmodule", $authFunction, function () {
    if(AuthController::authenticate())
    {
        ModuleController::showEditModule();
    }
    else{
        Router::redirect("/login");
    }
});
Router::route_auth("POST", "/main/editmodule", $authFunction, function () {
    if(AuthController::authenticate())
    {
        ModuleController::editModule();
    }
    else{
        Router::redirect("/login");
    }
});
Router::route_auth("POST", "/main/addmodule", $authFunction, function () {
    if(AuthController::authenticate()) {
        ModuleController::addModule();
        Router::redirect("/main");
    }
    else{
        Router::redirect("/login");
    }


});
Router::route_auth("GET", "/main", $authFunction, function () {
    if(AuthController::authenticate()) {
    ModuleController::showModules();
    }
    else{
        Router::redirect("/login");
    }
});
try {
    Router::call_route($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO']);
} catch (HTTPException $exception) {
    $exception->getHeader();
    ErrorController::show404();
}?>

<link rel="stylesheet" type="text/css" href="view/assets/css/jquery-comments.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.textcomplete/1.8.0/jquery.textcomplete.js"></script>
<script type="text/javascript" src="view/assets/js/jquery-comments.js"></script>
<!-- Data to be deleted later Ali-->
<script type="text/javascript" src="data/comments-data.js"></script>


