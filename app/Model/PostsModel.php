<?php
namespace App\Model;
use Core\Model\Model;
/**
* Class PostModel
*/
class PostsModel extends Model
{
	/**
	* @return $posts Obj stdClass
	*/
	public function all(){
		$posts = $this->MySql->query('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y") as date_fr FROM posts');
		return $posts;
	}

	/**
	* @param $id int
	* @return $post Obj stdClass
	*/
	public function select($id){
		$post = $this->MySql->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y") as date_fr FROM posts WHERE id= ?', $id, true);
		return $post;
	}

	/**
	* @param $from int
	* @param $to int
	* @return $postLimit Obj stdClass
	*/
	public function postsLimit($from, $to){
		$postLimit = $this->MySql->query('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y") as date_fr FROM posts ORDER BY id ASC LIMIT '. $from . ',' . $to);
		return $postLimit;
	}

	/**
	* @return $max Obj stdClass
	*/
	public function max(){
		$max = $this->MySql->query('SELECT MAX(id) as maxId FROM posts', true);
		return $max;
	}

	/**
 	* @return $min
 	*/
	public function min(){
		$min = $this->MySql->query('SELECT MIN(id) as minId FROM posts', true);
		return $min;
	} 

	/**
	* @param $attributes array
	* @return $return Obj stdClass
	*/
	public function update($attributes){
		$update = $this->MySql->prepare('UPDATE posts SET title = :title, content= :content WHERE id=:id', $attributes);
		return $update;
	}

	/**
	* @param $attributes array
	* @return $return Obj stdClass
	*/
	public function delete($attributes){
		$delete = $this->MySql->prepare('DELETE FROM posts WHERE id=:id', $attributes);
		return $delete;
	}

	/**
	* @param $attributes array
	* @return $return Obj stdClass
	*/
	public function add($attributes){
		$add = $this->MySql->prepare('INSERT INTO posts(title, content, creation_date) VALUES(:title, :content, NOW())', $attributes);
		return $add;
	}
}