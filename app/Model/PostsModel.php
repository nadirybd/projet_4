<?php
namespace App\Model;
use Core\Model\Model;
/**
* Class PostModel
*/
class PostsModel extends Model
{
	public function all(){
		$posts = $this->MySql->query('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y") as date_fr FROM posts');
		return $posts;
	}

	public function select($id){
		$post = $this->MySql->query('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y") as date_fr FROM posts WHERE id='. $id, true);
		return $post;
	}

	public function max(){
		$max = $this->MySql->query('SELECT MAX(id) as maxId FROM posts', true);
		return $max;
	}
}