<?php
namespace App\Model;
use Core\Model\Model;
/**
* Class PostModel
*/
class PostsModel extends Model
{
	public function all(){
		$posts = $this->MySql->query('SELECT * FROM posts');
		return $posts;
	}
}