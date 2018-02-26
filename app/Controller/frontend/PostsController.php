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
		$max = $this->postsModel->max();

		if(isset($_GET['id']) && intval($_GET['id']) && $_GET['id'] >= 1 && $_GET['id'] <= $max->maxId){
			$post = $this->postsModel->select($_GET['id']);
		} else {
			$post = $this->postsModel->select($_GET['id'] = 1);
		}
		
		$this->renderFrontend('post', compact('post', 'max'));
	}

	public static function getInstance(){
		if(self::$_instance === null){
			return self::$_instance = new PostsController();
		}
		return self::$_instance;
	}
}