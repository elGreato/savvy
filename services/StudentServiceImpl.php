<?php
namespace services;
//require_once(realpath(dirname(__FILE__)) . '/Student.php');
require_once(realpath(dirname(__FILE__)) . '/StudentService.php');
use domain\Authtoken;
use domain\Student;
use dao\StudentDAO;
use dao\AuthtokenDAO;
use services\StudentService;
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
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
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
        if(isset($this->currentStudentId))
            return true;
        return false;
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
        $studentDAO = new StudentDAO();
        $student = $studentDAO->findByUsername($username);
        if (isset($student)) {
            if (password_verify($password, $student->getPassword())) {
                if (password_needs_rehash($student->getPassword(), PASSWORD_DEFAULT)) {
                    $student->setPassword(password_hash($password, PASSWORD_DEFAULT));
                    $studentDAO->update($student);
                }
                $this->currentStudentId = $student->getId();

                return true;
            }
        }
        return false;
	}

	/**
	 * @access public
	 * @return Student
	 * @ReturnType Student
	 */
	public function readStudent() {
        if($this->verifyAuth()) {
            $studentDAO = new StudentDAO();
            return $studentDAO->read($this->currentStudentId);
        }
        throw new HTTPException(HTTPStatusCode::HTTP_401_UNAUTHORIZED);
	}

	/**
	 * @access public
	 * @param String token
	 * @return boolean
	 * @ParamType token String
	 * @ReturnType boolean
	 */
	public function validateToken(&$token) {
        $tokenArray = explode(":", $token);
        $authTokenDAO = new AuthTokenDAO();
        $authToken = $authTokenDAO->findBySelector($tokenArray[0]);
        if (!empty($authToken)) {
            if(time()<=(new \DateTime($authToken->getExpiration()))->getTimestamp()){
                if (hash_equals(hash('sha384', hex2bin($tokenArray[1])), $authToken->getValidator())) {
                    $this->currentStudentId = $authToken->getStudentid();
                    if($authToken->getType()===self::RESET_TOKEN){
                        $authTokenDAO->delete($authToken->getId());
                    }
                    return true;
                }
            }
            $authTokenDAO->delete($authToken);
        }
        return false;
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
    public function issueToken($type = self::STUDENT_TOKEN, $email = null) {
        $token = new AuthToken();
        $token->setSelector(bin2hex(random_bytes(5)));
        if($type===self::STUDENT_TOKEN) {
            $token->setType(self::STUDENT_TOKEN);
            $token->setStudentid($this->currentStudentId);
            $timestamp = (new \DateTime('now'))->modify('+30 days');
        }
        elseif(isset($email)){
            $token->setType(self::RESET_TOKEN);
            $token->setStudentid((new StudentDAO())->findByEmail($email)->getId());
            $timestamp = (new \DateTime('now'))->modify('+1 hour');
        }else{
            throw new HTTPException(HTTPStatusCode::HTTP_406_NOT_ACCEPTABLE, 'RESET_TOKEN without email');
        }
        $token->setExpiration($timestamp->format("Y-m-d H:i:s"));
        $validator = random_bytes(20);
        $token->setValidator(hash('sha384', $validator));
        $authTokenDAO = new AuthTokenDAO();
        $authTokenDAO->create($token);
        return $token->getSelector() .":". bin2hex($validator);
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
        $studentDAO = new StudentDAO();
        $student = new Student();
		$student->setUsername($username);
		$student->setPassword(password_hash($password, PASSWORD_DEFAULT));
		$student->setEmail($email);
		if($this->verifyAuth())
        {
            $dbStudent = $studentDAO->read($this->currentStudentId);
            if($dbStudent->getEmail()!==$student->getEmail()&&!is_null($studentDAO->findByEmail($email)))
            {
                return false;
            }
            $studentDAO->update($student);
            return true;
        }
        else{
            $dbEmail = $studentDAO->findByEmail($email);
            $dbUsername = $studentDAO->findByUsername($username);
            if((sizeof($dbUsername)!=0)&&(sizeof($dbEmail )!=0)){
                return "bothTaken";
            }
            else if(sizeof($dbUsername) !=0)
            {
                return "usernameTaken";
            }
            else if (sizeof($dbEmail)!=0)
            {
                return "emailTaken";
            }
            else
            {
                $studentDAO->create($student);
                return "successful";
            }

        }
	}
	public function readStudentByEmail($email){
        $studentDAO = new StudentDAO();
        return $student = $studentDAO->findByEmail($email);
    }
    public function updateStudent($student)
    {
        $studentDAO = new StudentDAO();
        $studentDAO->update($student);
    }
    public function changePassword()
    {
       $student = $this->readStudent();
        if(password_verify($_POST["old_pw"],$student->getPassword()))
        {
            $student->setPassword(password_hash($_POST["new_pw"], PASSWORD_DEFAULT));
            $this->updateStudent($student);
            return true;
        }
        else
        {
            return false;
        }
    }
    public function resetPassword(Student $student)
    {
        $student->setPassword(password_hash($_POST["password"], PASSWORD_DEFAULT));
        $this->updateStudent($student);
    }
}
?>