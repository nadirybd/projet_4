<?php
namespace App\Controller\Frontend;
use Core\Controller\Controller;
/**
* PostsController
*/
class PostsController extends Controller
{
	/**
	* $_instance variable qui stocke une instance 
	*/
	private static $_instance;

	public function home(){
		$posts = $this->postsModel->all();
		$this->renderFrontend('home', compact('posts'));
	}

	/**
	* Méthode post_comments qui affiche le post selectionné et les 
	* commentaires par post
	*/
	public function post_comments(){
		$max = $this->postsModel->max();

		if(isset($_GET['id']) && intval($_GET['id']) && $_GET['id'] > 0 && $_GET['id'] <= $max->maxId){
			$post = $this->postsModel->select($_GET['id']);
			$comments = $this->commentsModel->showByLimit($_GET['id']);
		} else {
			$post = $this->postsModel->select($_GET['id'] = 1);
			$comments = $this->commentsModel->showByLimit($_GET['id'] = 1);
		}
		if($_POST){
			$this->commentsModel->report([$_POST['report']]);
		}

		$this->renderFrontend('post', compact('post', 'max', 'comments'));
	}

	/**
	* @return l'instance stocké dans la variable $_instance
	*/
	public static function getInstance(){
		if(self::$_instance === null){
			return self::$_instance = new PostsController();
		}
		return self::$_instance;
	}
}
