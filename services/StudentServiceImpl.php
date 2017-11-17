<?php
require_once(realpath(dirname(__FILE__)) . '/Student.php');
require_once(realpath(dirname(__FILE__)) . '/StudentService.php');

/**
 * @access public
 * @author Kevin
 */
class StudentServiceImpl implements StudentService {
	/**
	 * @AttributeType StudentServiceImpl
	 */
	private static $instance = null;
	/**
	 * @AttributeType int
	 */
	private $currentStudentId;

	/**
	 * @access public
	 * @return StudentServiceImpl
	 * @static
	 * @ReturnType StudentServiceImpl
	 */
	public static function getInstance() {
		return self::$instance;
	}

	/**
	 * @access protected
	 */
	protected function __construct() {
		// Not yet implemented
	}

	/**
	 * @access private
	 */
	private function __clone() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @return boolean
	 * @ReturnType boolean
	 */
	public function verifyAuth() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @return int
	 * @ReturnType int
	 */
	public function getCurrentStudentId() {
		return $this->currentStudentId;
	}

	/**
	 * @access public
	 * @param String username
	 * @param String password
	 * @return boolean
	 * @ParamType username String
	 * @ParamType password String
	 * @ReturnType boolean
	 */
	public function verifyStudent(&$username, &$password) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @return Student
	 * @ReturnType Student
	 */
	public function readStudent() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param String token
	 * @return boolean
	 * @ParamType token String
	 * @ReturnType boolean
	 */
	public function validateToken(&$token) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int=self::STUDENT_TOKEN type
	 * @param String = null email
	 * @return String
	 * @ParamType type int=self::STUDENT_TOKEN
	 * @ParamType email String = null
	 * @ReturnType String
	 */
    public function issueToken($type = self__STUDENT_TOKEN, $email = null) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param username string
	 * @param String password
	 * @param String email
	 * @return boolean
	 * @ParamType string username
	 * @ParamType password String
	 * @ParamType email String
	 * @ReturnType boolean
	 */
    public function addStudent($username, $password, $email) {
		// Not yet implemented
	}
}
?>