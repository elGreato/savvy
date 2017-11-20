<?php
namespace services;
/**
 * @access public
 * @author Kevin
 */
interface ModuleSelectionService {

	/**
	 * @access public
	 * @param int id
	 * @return Module
	 * @ParamType id int
	 * @ReturnType Module
	 */
	public function selectModule(&$id);

	/**
	 * @access public
	 * @param int moduleId
	 * @return Module
	 * @ParamType moduleId int
	 * @ReturnType Module
	 */
	public function deselectModule(&$moduleId);

	/**
	 * @access public
	 * @return Module[]
	 * @ReturnType Module[]
	 */
	public function showSelectedModules();

	/**
	 * @access public
	 * @return int
	 * @ReturnType int
	 */
	public function showNumCredits();
}
?>