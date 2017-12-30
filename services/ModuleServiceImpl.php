<?php
namespace services;
require_once(realpath(dirname(__FILE__)) . '/ModuleService.php');
use dao\InscriptionDAO;
use dao\ModuleDAO;
use domain\Module;
/**
 * @access public
 * @author Kevin + Ali
 */
class ModuleServiceImpl implements ModuleService {

	/**
	 * @access public
	 * @param Module module
	 * @return Module
	 * @ParamType module Module
	 * @ReturnType String
	 */
	public function addModule(Module $module) {
      //  if(StudentServiceImpl::getInstance()->verifyAuth()) {
            $moduleDAO = new ModuleDAO();
            $searchedModule = $moduleDAO->readByName($module->getName());
            if(!isset($searchedModule)){
                $moduleDAO->create($module);
                return null;
            }
            else{
                return $module;
            }
       // }
	}

	/**
	 * @access public
	 * @param int id
	 * @ParamType id int
	 */
	public function deleteModule(&$id) {
        //if(StudentServiceImpl::getInstance()->verifyAuth()) {
        $readModule = $this->readModule($id);
        if(StudentServiceImpl::getInstance()->getCurrentStudentId()==$readModule->getEditorid()) {
            $moduleDAO = new ModuleDAO();
            $moduleDAO->delete($id);
        }
       // }
	}

	/**
	 * @access public
	 * @param int id
	 * @return Module
	 * @ParamType id int
	 * @ReturnType Module
	 */
	public function readModule(&$id) {
       // if(StudentServiceImpl::getInstance()->verifyAuth()) {
            $moduleDAO = new ModuleDAO();
            return $moduleDAO->read($id);
       // }
	}

	/**
	 * @access public
	 * @return Module[]
	 * @ReturnType Module[]
	 */
	public function readAllModules() {
       // if(StudentServiceImpl::getInstance()->verifyAuth()) {
            $moduleDAO = new ModuleDAO();
            $modules = $moduleDAO->readAll();
            foreach ($modules as $module)
            {
                $inscriptionDAO = new InscriptionDAO();
                $module->setInscriptions($inscriptionDAO->readInscriptionsByModule($module->getId()));
            }
            return $modules;
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
	    $readModule = $this->readModule($module->getId());
       if(StudentServiceImpl::getInstance()->getCurrentStudentId()==$readModule->getEditorid()) {
            $moduleDAO = new ModuleDAO();
            $moduleDAO->update($module);
        }
	}
	public function getModId(Module $mod){
	    return $mod->getId();
    }

}
?>