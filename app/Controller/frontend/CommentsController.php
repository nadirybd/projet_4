<?php
namespace App\Controller\Frontend;
use Core\Controller\Controller;
/**
* CommentsController
*/
class CommentsController extends Controller
{
	/**
	* $_instance variable qui stocke une instance 
	*/
	private static $_instance;

	/**
	* Méthode comments qui affiche les commentaires par post
	*/
	public function comments(){
		$max = $this->postsModel->max();

		if(isset($_GET['id']) && intval($_GET['id']) && $_GET['id'] >= 1 && $_GET['id'] <= $max->maxId){
			$comments = $this->commentsModel->selectByPost($_GET['id']);
		} else {
			$comments = $this->commentsModel->selectByPost($_GET['id'] = 1);
		}
		$this->renderFrontend('comments', compact('comments'));
	}

	/**
	* @return l'instance stocké dans la variable $_instance
	*/
	public static function getInstance(){
		if(self::$_instance === null){
			return self::$_instance = new CommentsController();
		}
		return self::$_instance;
	}
}