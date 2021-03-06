<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 23.11.2017
 * Time: 17:41
 */

namespace controller;
use dao\ModuleDAO;
use domain\Module;
use services\ModuleServiceImpl;
use services\StudentServiceImpl;
use validator\ModuleValidator;
use view\TemplateView;
use router\Router;

class ModuleController
{
    public static function showModules()
    {
        $tempView = new TemplateView("view/main.php");
        $moduleService = new ModuleServiceImpl();
        $modules = $moduleService->readAllModules();
        $tempView->modules = $modules;
        $studentService = StudentServiceImpl::getInstance();
        $tempView->studentid = $studentService->getCurrentStudentId();

        echo $tempView->createView();

    }
    public static function showAddModule()
    {
        $tempView = new TemplateView("view/addModule.php");
        echo $tempView->createView();
    }
    public static function showEditModule()
    {
        $moduleService = new ModuleServiceImpl();
        $module = $moduleService->readModule($_GET["id"]);
        if($module->getEditorid()==StudentServiceImpl::getInstance()->getCurrentStudentId()) {
            $tempView = new TemplateView("view/editModule.php");
            $tempView->id = $module->getId();
            $tempView->name = $module->getName();
            $tempView->description = $module->getDescription();
            $tempView->ects = $module->getNumcredits();
            echo $tempView->createView();
        }
        else{
            Router::redirect("/main");
        }
    }
    public static function addModule()
    {
        $module = new Module();
        $module->setName(htmlspecialchars($_POST["module_name"]));
        $module->setDescription(htmlspecialchars($_POST["module_description"]));
        $module->setNumcredits(htmlspecialchars($_POST["num_credits"]));
        $editorid = StudentServiceImpl::getInstance()->getCurrentStudentId();
        $module->setEditorid($editorid);
        $moduleServiceImpl = new ModuleServiceImpl();


        $moduleValidator = new ModuleValidator($module);
        if($moduleValidator->isValid()) {
            if($moduleServiceImpl->addModule($module)!=null)
            {
                $tempView = new TemplateView("view/addModule.php");
                $tempView->nameReply = "The selected module name is already used!";
                $tempView->name = $module->getName();
                $tempView->description = $module->getDescription();
                $tempView->ects = $module->getNumcredits();
                echo $tempView->createView();
            }
            else {
                Router::redirect("/main");
            }
        }
        else{
            $tempView = new TemplateView("view/addModule.php");
            if ($moduleValidator->getNameError() != null) {
                $tempView->nameReply = $moduleValidator->getNameError();
            }
            if ($moduleValidator->getDescriptionError() != null) {
                $tempView->descriptionReply = $moduleValidator->getDescriptionError();
            }
            if ($moduleValidator->getEctsError() != null) {
                $tempView->ectsReply = $moduleValidator->getEctsError();
            }
            $tempView->name = $module->getName();
            $tempView->description = $module->getDescription();
            $tempView->ects = $module->getNumcredits();
            echo $tempView->createView();

        }
    }
    public static function editModule()
    {
        $module = new Module();
        $module->setId($_POST["module_id"]);
        $module->setName($_POST["module_name"]);
        $module->setDescription($_POST["module_description"]);
        $module->setNumcredits($_POST["num_credits"]);
        $moduleServiceImpl = new ModuleServiceImpl();
        $readModule =$moduleServiceImpl->readModule($_POST["module_id"]);
        if ($readModule->getEditorid()==StudentServiceImpl::getInstance()->getCurrentStudentId()) {


            $moduleValidator = new ModuleValidator($module);
            if ($moduleValidator->isValid()) {
                if ($moduleServiceImpl->updateModule($module) != null) {
                    $tempView = new TemplateView("view/editModule.php");
                    $tempView->nameReply = "The selected module name is already used!";
                    echo $tempView->createView();
                } else {
                    Router::redirect("/main");
                }
            } else {
                $tempView = new TemplateView("view/editModule.php");
                if ($moduleValidator->getNameError() != null) {
                    $tempView->nameReply = $moduleValidator->getNameError();
                }
                if ($moduleValidator->getDescriptionError() != null) {
                    $tempView->descriptionReply = $moduleValidator->getDescriptionError();
                }
                if ($moduleValidator->getEctsError() != null) {
                    $tempView->ectsReply = $moduleValidator->getEctsError();
                }

                $tempView->id = $module->getId();
                $tempView->name = $module->getName();
                $tempView->description = $module->getDescription();
                $tempView->ects = $module->getNumcredits();
                echo $tempView->createView();

            }
        }
        else
        {
            router::redirect("/main");
        }
    }
    public static function deleteModule()
    {
        $moduleService = new ModuleServiceImpl();
        $moduleToDelete = $moduleService->readModule($_GET["id"]);
        $studentService =StudentServiceImpl::getInstance();
        if($studentService->getCurrentStudentId()==$moduleToDelete->getEditorid())
        {
            $moduleService->deleteModule($_GET["id"]);
        }
        Router::redirect("/main");
    }
}