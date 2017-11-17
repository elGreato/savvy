<?php
require_once(realpath(dirname(__FILE__)) . '/Comment.php');

/**
 * @access public
 * @author Kevin
 */
interface CommentingService {

	/**
	 * @access public
	 * @param comment comment
	 * @return Comment
	 * @ParamType comment comment
	 * @ReturnType Comment
	 */
	public function addComment(Comment $comment);

	/**
	 * @access public
	 * @param int id
	 * @return Comment
	 * @ParamType id int
	 * @ReturnType Comment
	 */
	public function deleteComment(&$id);

	/**
	 * @access public
	 * @param int moduleId
	 * @return Comment[]
	 * @ParamType moduleId int
	 * @ReturnType Comment[]
	 */
	public function readCommentsForModule(&$moduleId);

	/**
	 * @access public
	 * @param Comment comment
	 * @return Comment
	 * @ParamType comment Comment
	 * @ReturnType Comment
	 */
	public function updateComment(Comment $comment);

	/**
     * @access public
     * @param int id
     * @param boolean isLike
     * @return Comment
     * @ParamType id int
     * @ParamType isLike boolean
     * @ReturnType Comment
	 */
	public function voteOnComment(&$id, &$isLike);
}
?>