<?php
namespace App\Controller\Frontend;
use Core\Controller\Controller;
/**
* PostsController
*/
class PostsController extends Controller
{
	private static $_instance;

	public function index(){
		ob_start();
		$posts = $this->postsModel->all();
		compact('posts');
		require('View/frontend/home.php');
		$content = ob_get_clean();
		require('View/templates/default.php');
	}

	public static function getInstance(){
		if(self::$_instance === null){
			return self::$_instance = new PostsController();
		}
		return self::$_instance;
	}
}