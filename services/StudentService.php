<?php
require_once(realpath(dirname(__FILE__)) . '/Student.php');

/**
 * @access public
 * @author Kevin
 */
interface StudentService {

	/**
	 * @access public
	 * @param String username
	 * @param String password
	 * @return boolean
	 * @ParamType username String
	 * @ParamType password String
	 * @ReturnType boolean
	 */
	public function verifyStudent(&$username, &$password);

	/**
	 * @access public
	 * @return Student
	 * @ReturnType Student
	 */
	public function readStudent();

	/**
	 * @access public
	 * @param String token
	 * @return boolean
	 * @ParamType token String
	 * @ReturnType boolean
	 */
	public function validateToken(&$token);

	/**
	 * @access public
	 * @param int type = self::STUDENT_TOKEN
	 * @param String email = null
	 * @return String
	 * @ParamType type int=self::STUDENT_TOKEN
	 * @ParamType String email = null
	 * @ReturnType String
	 */
	public function issueToken($type = self__STUDENT_TOKEN, $email = null);

	/**
	 * @access public
	 * @param String username
	 * @param String password
	 * @param String email
	 * @return boolean
	 * @ParamType String username
	 * @ParamType String password
	 * @ParamType String email
	 * @ReturnType boolean
	 */
	public function addStudent($username, $password, $email);
}
?>