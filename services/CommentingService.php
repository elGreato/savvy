<?php
namespace services;
use domain\Comment;
use domain\Commentvote;
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
	 * @ParamType id int
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
	 * @ParamType comment Comment
	 */
	public function updateComment(Comment $comment);

	/**
     * @access public
     * @param int id
     * @ParamType id int
	 */
	public function voteOnComment(&$id);
    /**
     * @access public
     * @param int id
     * @ParamType id int
     */
	public function deleteVote(&$id);
}
?>