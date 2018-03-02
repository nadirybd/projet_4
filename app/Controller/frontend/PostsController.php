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
	public function post(){
		$max = $this->postsModel->max();
		$min = $this->postsModel->min();

		if(isset($_GET['id']) && intval($_GET['id']) && $_GET['id'] > 0 && $_GET['id'] <= $max->maxId){
			$post = $this->postsModel->select([$_GET['id']]);
			if(!is_object($post)){
				$_GET['id'] = $min->minId;
				$post = $this->postsModel->select([$_GET['id']]);
			}
			$comments = $this->commentsModel->showByLimit($_GET['id']);
		} else {
			$_GET['id'] = $min->minId;
			$post = $this->postsModel->select([$_GET['id']]);
			$comments = $this->commentsModel->showByLimit($_GET['id']);
		}

		if(isset($_POST['send_report'])){
			$this->commentsModel->report([$_POST['report']]);
		}
		elseif(isset($_POST['delete_comment'])){
			$this->commentsModel->delete([$_POST['delete']]);
				header('location: index.php?p=post&id='. $_GET['id']);
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
