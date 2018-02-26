<?php
namespace App\Controller\Frontend;
use Core\Controller\Controller;
/**
* PostsController
*/
class PostsController extends Controller
{
	private static $_instance;

	public function home(){
		$posts = $this->postsModel->all();
		$this->renderFrontend('home', compact('posts'));
	}

	public function post(){
		$post = $this->postsModel->select($_GET['id']);
		$this->renderFrontend('post', compact('post'));
	}

	public static function getInstance(){
		if(self::$_instance === null){
			return self::$_instance = new PostsController();
		}
		return self::$_instance;
	}
}