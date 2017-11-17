<?php
require_once(realpath(dirname(__FILE__)) . '/ModuleSelectionService.php');
use dao\InscriptionDAO;
use domain\Inscription;
/**
 * @access public
 * @author Kevin
 */
class ModuleSelectionServiceImpl implements ModuleSelectionService {

	/**
	 * @access public
	 * @param int id
	 * @return Module
	 * @ParamType id int
	 * @ReturnType Module
	 */
	public function selectModule(&$id) {
        if(StudentServiceImpl::getInstance()->verifyAuth()) {
            $studentId = StudentServiceImpl::getInstance()->getCurrentStudentId();
            $inscriptionDAO = new InscriptionDAO();
            $inscription = new Inscription();
            $inscription->setModuleid($id);
            $inscription->setStudentid($studentId);
            $inscriptionDAO->create($inscription);
        }
	}

	/**
	 * @access public
	 * @param int moduleId
	 * @return Module
	 * @ParamType moduleId int
	 * @ReturnType Module
	 */
	public function deselectModule(&$moduleId) {
        if(StudentServiceImpl::getInstance()->verifyAuth()) {
            $studentId = StudentServiceImpl::getInstance()->getCurrentStudentId();
            $inscriptionDAO = new InscriptionDAO();
            $inscriptionDAO->delete($moduleId,$studentId);
        }
	}

	/**
	 * @access public
	 * @return Module[]
	 * @ReturnType Module[]
	 */
	public function showSelectedModules() {
        if(StudentServiceImpl::getInstance()->verifyAuth()) {
            $studentId = StudentServiceImpl::getInstance()->getCurrentStudentId();
            $inscriptionDAO = new InscriptionDAO();
            return $inscriptionDAO->readInscriptions($studentId);
        }
	}

	/**
	 * @access public
	 * @return int
	 * @ReturnType int
	 */
	public function showNumCredits() {
        if(StudentServiceImpl::getInstance()->verifyAuth()) {
            $modules = $this->showSelectedModules();
            $numcredits = 0;
            foreach($modules as $module)
            {
                $numcredits+=$module->getNumcredits();
            }
            return $numcredits;
        }
	}
}
?>