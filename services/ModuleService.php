<?php
/**
 * @access public
 * @author Kevin
 */
use domain\Module;
interface ModuleService {

	/**
	 * @access public
	 * @param Module module
	 * @return Module
	 * @ParamType module Module
	 * @ReturnType Module
	 */
	public function addModule(Module $module);

	/**
	 * @access public
	 * @param int id
	 * @ParamType id int
	 */
	public function deleteModule(&$id);

	/**
	 * @access public
	 * @param int id
	 * @return Module
	 * @ParamType id int
	 * @ReturnType Module
	 */
	public function readModule(&$id);

	/**
	 * @access public
	 * @return Module[]
	 * @ReturnType Module[]
	 */
	public function readAllModules();

	/**
	 * @access public
	 * @param Module module
	 * @return Module
	 * @ParamType module Module
	 * @ReturnType Module
	 */
	public function updateModule(Module $module);
}
?>