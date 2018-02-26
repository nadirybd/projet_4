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
 			SELECT comments.id, comments.pseudo, comments.comment, comments.post_id, DATE_FORMAT(comments.comment_date, "%d/%m/%Y à %Hh%imin%ss") as comment_dateFr, posts.id 
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
 			SELECT comments.id, comments.pseudo, comments.comment, comments.post_id, DATE_FORMAT(comments.comment_date, "%d/%m/%Y à %Hh%imin%ss") as comment_dateFr, posts.id 
 			FROM comments 
 			RIGHT JOIN posts 
 				ON comments.post_id = posts.id
 			WHERE posts.id = '. $id .' ORDER BY comment_dateFr DESC');
 		return $comments;
 	}

 	/**
 	* @param $attributes array
 	* @return $add stdClass
 	*/
 	public function add($attributes){
 		$add = $this->MySql->prepare('INSERT INTO comments(pseudo, comment, comment_date, post_id) VALUES (:pseudo, :comment, NOW(), :post_id)', $attributes);
 		return $add;
 	}
}