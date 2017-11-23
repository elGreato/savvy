<?php
namespace services;
require_once(realpath(dirname(__FILE__)) . '/ModuleService.php');
use dao\ModuleDAO;
use domain\Module;
/**
 * @access public
 * @author Kevin
 */
class ModuleServiceImpl implements ModuleService {

	/**
	 * @access public
	 * @param Module module
	 * @return Module
	 * @ParamType module Module
	 * @ReturnType Module
	 */
	public function addModule(Module $module) {
        if(StudentServiceImpl::getInstance()->verifyAuth()) {
            $moduleDAO = new ModuleDAO();
            $moduleDAO->create($module);
        }
	}

	/**
	 * @access public
	 * @param int id
	 * @ParamType id int
	 */
	public function deleteModule(&$id) {
        if(StudentServiceImpl::getInstance()->verifyAuth()) {
            $moduleDAO = new ModuleDAO();
            $moduleDAO->delete($id);
        }
	}

	/**
	 * @access public
	 * @param int id
	 * @return Module
	 * @ParamType id int
	 * @ReturnType Module
	 */
	public function readModule(&$id) {
        if(StudentServiceImpl::getInstance()->verifyAuth()) {
            $moduleDAO = new ModuleDAO();
            return $moduleDAO->read($id);
        }
	}

	/**
	 * @access public
	 * @return Module[]
	 * @ReturnType Module[]
	 */
	public function readAllModules() {
       // if(StudentServiceImpl::getInstance()->verifyAuth()) {
            $moduleDAO = new ModuleDAO();
            return $moduleDAO->readAll();
       // }
	}

	/**
	 * @access public
	 * @param Module module
	 * @return Module
	 * @ParamType module Module
	 * @ReturnType Module
	 */
	public function updateModule(Module $module) {
        if(StudentServiceImpl::getInstance()->verifyAuth()) {
            $moduleDAO = new ModuleDAO();
            $moduleDAO->update($module);
        }
	}
}
?>