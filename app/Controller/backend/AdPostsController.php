<?php
namespace App\Controller\Backend;

use Core\Controller\Controller;

/**
* Class PostsController spécifique au backend
*/
class AdPostsController extends Controller
{
	private static $_instance;

	public function adminPosts(){
		$posts = $this->postsModel->all();
		$this->renderBackend('admin-posts', compact('posts'));
	}

	public static function getInstance(){
		if(self::$_instance === null){
			return self::$_instance = new AdPostsController();
		}
		return self::$_instance;
	}
}