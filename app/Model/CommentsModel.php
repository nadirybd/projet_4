<?php
namespace App\Model;
use Core\Model\Model;
/**
* Class CommentsModel qui hérite de la class Model
*/
class CommentsModel extends Model
{
	/**
	* @param $id int
	* @return $comments Obj stdClass
	*/
 	public function showbyLimit($id){
 		$comments = $this->MySql->query('
 			SELECT comments.id as comment_id, comments.pseudo, comments.comment, comments.report_id, comments.post_id, DATE_FORMAT(comments.comment_date, "%d/%m/%Y à %Hh%imin%ss") as comment_dateFr, posts.id 
 			FROM comments 
 			RIGHT JOIN posts 
 				ON comments.post_id = posts.id
 			WHERE posts.id = '. $id .' ORDER BY comment_dateFr DESC LIMIT 0, 3');
 		return $comments;
 	}

 	/**
	* @param $id int
	* @return $comments Obj stdClass
	*/
 	public function selectByPost($id){
 		$comments = $this->MySql->query('
 			SELECT comments.id as comment_id, comments.pseudo, comments.comment, comments.report_id, comments.post_id, DATE_FORMAT(comments.comment_date, "%d/%m/%Y à %Hh%imin%ss") as comment_dateFr, posts.id 
 			FROM comments 
 			RIGHT JOIN posts 
 				ON comments.post_id = posts.id
 			WHERE posts.id = '. $id .' ORDER BY comment_dateFr DESC');
 		return $comments;
 	}
 	
 	/**
	* @return $comments_report Obj stdClass
	*/
 	public function selectByReport(){
 		$comments_report = $this->MySql->query('
 			SELECT comments.id, comments.report_id, comments.pseudo, comments.comment
 			FROM comments 
 			WHERE report_id > 0 ORDER BY report_id DESC');
 		return $comments_report;
 	}

 	/**
 	* @param $attributes array
 	* @return $add stdClass
 	*/
 	public function add($attributes){
 		$add = $this->MySql->prepare('INSERT INTO comments(pseudo, comment, comment_date, post_id) VALUES (:pseudo, :comment, NOW(), :post_id)', $attributes);
 		return $add;
 	}

 	/**
 	* @param $attributes array
 	* @return $report stdClass
 	*/
 	public function report($attributes){
 		$report = $this->MySql->prepare('UPDATE comments SET report_id =report_id + 1 WHERE id= ?', $attributes);
 		return $report;
 	}

 	/**
 	* @param $attributes array
 	* @return $delete stdClass
 	*/
 	public function delete($attributes){
 		$delete = $this->MySql->prepare('DELETE FROM comments WHERE id= ?', $attributes);
 		return $delete;
 	}
}