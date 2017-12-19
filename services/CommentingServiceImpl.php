<?php
namespace services;

/**
 * @access public
 * @author Ali, Kevin
 */
use dao\CommentDAO;
use dao\CommentVoteDAO;
use dao\StudentDAO;
use domain\Comment;
use domain\Commentvote;
use services\StudentServiceImpl;
class CommentingServiceImpl implements CommentingService {

	/**
	 * @access public
	 * @param Comment comment
	 * @return Comment
	 * @ParamType comment Comment
	 * @ReturnType Comment
	 */
	public function addComment(Comment $comment) {
       // if(StudentServiceImpl::getInstance()->verifyAuth()) {
            $comment->setStudentid(StudentServiceImpl::getInstance()->getCurrentStudentId());
            $commentDAO = new CommentDAO();
            $commentDAO->create($comment);

        //}
	}
	public function getLastInsertId(Comment $comment){
        $commentDAO = new CommentDAO();
	    return $commentDAO->getLastInsertId($comment);
    }

	/**
	 * @access public
	 * @param int id
	 * @return Comment
	 * @ParamType id int
	 * @ReturnType Comment
	 */
	public function deleteComment(&$id) {
        //if(StudentServiceImpl::getInstance()->verifyAuth()) {
            $commentDAO = new CommentDAO();
            $comment = $commentDAO->read($id);
            if($comment->getStudentid() == StudentServiceImpl::getInstance()->getCurrentStudentId())
            {
                $commentDAO->delete($id);
            }
	    //}
    }
	/**
	 * @access public
	 * @param int moduleId
	 * @return Comment[]
	 * @ParamType moduleId int
	 * @ReturnType Comment[]
	 */
	public function readCommentsForModule(&$moduleId)
    {
        //if(StudentServiceImpl::getInstance()->verifyAuth()) {
            $commentDAO = new CommentDAO();
            $commentVoteDAO = new CommentVoteDAO();
            $studentDAO = new StudentDAO();
            $comments = $commentDAO->readCommentsForModule($moduleId);
            $studentService = StudentServiceImpl::getInstance();
            foreach ($comments as $comment) {
                $votes = $commentVoteDAO->readCommentLikes($comment->getId());
                $comment->setVote($votes);
                $student = $studentDAO->read($comment->getStudentid());
                $comment->setStudentname($student->getUsername());
                if($studentService->getCurrentStudentId() == $comment->getStudentid())
                {
                    $comment->setIsFromUser(true);
                }
                else{
                    $comment->setIsFromUser(false);
                }
            }
            return $comments;
      //  }
	}

	/**
	 * @access public
	 * @param Comment comment
	 * @return Comment
	 * @ParamType comment Comment
	 * @ReturnType Comment
	 */
	public function updateComment(Comment $comment) {
        //if(StudentServiceImpl::getInstance()->verifyAuth()) {
            $commentDAO = new CommentDAO();
            $commentToEdit = $commentDAO->read($comment->getId());
            if($commentToEdit->getStudentid() == StudentServiceImpl::getInstance()->getCurrentStudentId())
            {
                $commentDAO->update($comment);
            }
       // }
	}

	/**
	 * @access public
	 * @param int id
	 * @ParamType id int
	 */
	public function voteOnComment(&$id) {
      //  if(StudentServiceImpl::getInstance()->verifyAuth()) {
            $commentVoteDAO = new CommentVoteDAO();
            $studentid = StudentServiceImpl::getInstance()->getCurrentStudentId();
            $commentVote = new CommentVote();
            $commentVote->setCommentid($id);
            $commentVote->setStudentid($studentid);
            $commentVoteDAO->create($commentVote);

       // }
	}
    /**
     * @access public
     * @param int id
     * @ParamType id int
     */
    public function deleteVote(&$id) {
        //  if(StudentServiceImpl::getInstance()->verifyAuth()) {
        $commentVoteDAO = new CommentVoteDAO();
        $studentid = StudentServiceImpl::getInstance()->getCurrentStudentId();
        $commentVoteDAO->delete($id,$studentid);

        // }
    }
}
?>