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
use controller\ErrorController;
use http\HTTPException;
session_start();
require_once("config/Autoloader.php");




Router::route("GET", "/", function () {
    if(AuthController::authenticate())
    {
        Router::redirect("/main");
    }
    else{
        require_once("view/welcome.php");
    }


});
Router::route("GET", "/register", function () {
    $view = new TemplateView("view/register.php");
    echo $view->createView();

});
Router::route("POST", "/register", function () {
    StudentController::register();

});
Router::route("GET", "/login" , function () {
    $view = new TemplateView("view/login.php");
    echo $view->createView();

});
Router::route("POST", "/login", function () {
    AuthController::login();

});
Router::route("GET", "/contactus", function () {
    require_once("view/contactUs.php");

});
Router::route("POST", "/contactus", function () {
    ContactUsController::handleContactUs();

});
Router::route("GET", "/terms" , function () {

    $view = new TemplateView("view/terms.php");
    if(AuthController::authenticate()){
        $view->loggedIn = true;
    }
    else{
        $view->loggedIn = false;
    }
    echo $view->createView();

});


Router::route("GET", "/logout", function () {
    if(AuthController::authenticate()) {
        AuthController::logout();

    }
    Router::redirect("/login");

});
Router::route("GET", "/myprofile", function () {
    if(AuthController::authenticate())
    {
        StudentController::showMyProfile();
    }
    else{
        Router::redirect("/login");
    }

});
Router::route("POST", "/myprofile", function () {
    if(AuthController::authenticate())
    {
        StudentController::changePassword();
    }
    else{
        Router::redirect("/login");
    }

});
Router::route("GET", "/main", function () {
    if(AuthController::authenticate()) {
        ModuleController::showModules();
    }
    else{
        Router::redirect("/login");
    }
});
Router::route("GET", "/mymodules", function () {
    if(AuthController::authenticate())
    {
        MyModulesController::showMyModules();
    }
    else{
        Router::redirect("/login");
    }

});
Router::route("POST", "/myModules", function () {
    if (AuthController::authenticate())
        myModulesController::handleSelectedModules();
    else{
        Router::redirect("/login");
    }

});
Router::route("POST", "/pdfContent", function () {
    if(AuthController::authenticate())
    {
        PdfController::startPdf();
    }
    else{
        Router::redirect("/login");
    }

});

Router::route("GET", "/passwordreset", function () {
    StudentController::showPasswordReset();
});
Router::route("POST", "/passwordreset", function () {
    StudentController::resetPassword();
});
Router::route("GET", "/passwordreset/successful", function () {
    StudentController::requestSent();
});
Router::route("GET", "/passwordreset/reset", function () {
    StudentController::showNewPassword();
});
Router::route("POST", "/passwordreset/reset", function () {
    StudentController::confirmNewPassword();
});
Router::route("GET", "/module", function () {
    if (AuthController::authenticate())
    ModelContentController::handleModule();
    else{
        Router::redirect("/login");
    }

});

Router::route("POST", "/saveComment", function () {
    if (AuthController::authenticate())
    CommentController::saveComment();
    else{
        Router::redirect("/login");
    }

});
Router::route("POST", "/editComment", function () {
    if (AuthController::authenticate())
        CommentController::editComment();
    else{
        Router::redirect("/login");
    }

});

Router::route("GET", "/deleteComment", function () {
    if (AuthController::authenticate())
        CommentController::deleteComment();
    else{
        Router::redirect("/login");
    }

});
Router::route("GET", "/upvote", function () {
    if (AuthController::authenticate())
        CommentController::upvote();
    else{
        Router::redirect("/login");
    }

});
Router::route("GET", "/main/addmodule",function () {
    if(AuthController::authenticate())
    {
        ModuleController::showAddModule();
    }
    else{
        Router::redirect("/login");
    }
});
Router::route("POST", "/main/addmodule", function () {
    if(AuthController::authenticate()) {
        ModuleController::addModule();
        Router::redirect("/main");
    }
    else{
        Router::redirect("/login");
    }


});
Router::route("GET", "/main/deletemodule", function () {
    if(AuthController::authenticate())
    {
        ModuleController::deleteModule();
    }
    else{
        Router::redirect("/login");
    }

});
Router::route("GET", "/main/editmodule", function () {
    if(AuthController::authenticate())
    {
        ModuleController::showEditModule();
    }
    else{
        Router::redirect("/login");
    }
});
Router::route("POST", "/main/editmodule", function () {
    if(AuthController::authenticate())
    {
        ModuleController::editModule();
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
<script type="text/javascript" src="data/comments-data.js"></script>


