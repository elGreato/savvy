<?php
require_once(realpath(dirname(__FILE__)) . '/ModuleSelectionService.php');

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
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int moduleId
	 * @return Module
	 * @ParamType moduleId int
	 * @ReturnType Module
	 */
	public function deselectModule(&$moduleId) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @return Module[]
	 * @ReturnType Module[]
	 */
	public function showSelectedModules() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @return int
	 * @ReturnType int
	 */
	public function showNumCredits() {
		// Not yet implemented
	}
}
?>