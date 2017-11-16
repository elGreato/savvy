<?php
require_once(realpath(dirname(__FILE__)) . '/ModuleService.php');

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

	}

	/**
	 * @access public
	 * @param int id
	 * @ParamType id int
	 */
	public function deleteModule(&$id) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int id
	 * @return Module
	 * @ParamType id int
	 * @ReturnType Module
	 */
	public function readModule(&$id) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @return Module[]
	 * @ReturnType Module[]
	 */
	public function readAllModules() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param Module module
	 * @return Module
	 * @ParamType module Module
	 * @ReturnType Module
	 */
	public function updateModule(Module $module) {
		// Not yet implemented
	}
}
?>