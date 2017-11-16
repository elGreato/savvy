<?php
require_once(realpath(dirname(__FILE__)) . '/Comment.php');
require_once(realpath(dirname(__FILE__)) . '/CommentingService.php');

/**
 * @access public
 * @author Kevin
 */
use dao\CommentDAO;
use dao\CommentVoteDAO;
class CommentingServiceImpl implements CommentingService {

	/**
	 * @access public
	 * @param Comment comment
	 * @return Comment
	 * @ParamType comment Comment
	 * @ReturnType Comment
	 */
	public function addComment(Comment $comment) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int id
	 * @return Comment
	 * @ParamType id int
	 * @ReturnType Comment
	 */
	public function deleteComment(&$id) {
		// Not yet implemented
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
        if(StudentServiceImpl::getInstance()->verifyAuth()) {
            $commentDAO = new CommentDAO();
            $commentVoteDAO = new CommentVoteDAO();
            $comments = $commentDAO->readCommentsForModule();
            foreach ($comments as $comment) {
                $votes = $commentVoteDAO->readCommentLikes();
                $comment->setVote($votes);
            }
            return $comments;
        }
	}

	/**
	 * @access public
	 * @param Comment comment
	 * @return Comment
	 * @ParamType comment Comment
	 * @ReturnType Comment
	 */
	public function updateComment(Comment $comment) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int id
	 * @return Comment
	 * @ParamType id int
	 * @ReturnType Comment
	 */
	public function voteOnComment(&$id) {
		// Not yet implemented
	}
}
?>