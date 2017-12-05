<?php
namespace services;
require_once(realpath(dirname(__FILE__)) . '/Comment.php');
require_once(realpath(dirname(__FILE__)) . '/CommentingService.php');

/**
 * @access public
 * @author Kevin
 */
use dao\CommentDAO;
use dao\CommentVoteDAO;
use domain\Comment;
use domain\Commentvote;
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
            $comments = $commentDAO->readCommentsForModule($moduleId);
            foreach ($comments as $comment) {
                $votes = $commentVoteDAO->readCommentLikes($moduleId);
                $comment->setVote($votes);
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
     * @param boolean isLike
	 * @return Comment
	 * @ParamType id int
     * @ParamType isLike boolean
	 * @ReturnType Comment
	 */
	public function voteOnComment(&$id, &$isLike) {
      //  if(StudentServiceImpl::getInstance()->verifyAuth()) {
            $commentVoteDAO = new CommentVoteDAO();
            $studentid = StudentServiceImpl::getInstance()->getCurrentStudentId();
            $commentVote = new CommentVote();
            $commentVote->setModuleid($id);
            $commentVote->setStudentid($studentid);
            $commentVote->setVote($isLike);
            $commentVoteDAO->create($commentVote);

       // }
	}
}
?>