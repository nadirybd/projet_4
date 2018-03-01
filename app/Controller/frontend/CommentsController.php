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

		if(isset($_GET['id']) && intval($_GET['id']) && $_GET['id'] > 0 && $_GET['id'] <= $max->maxId){
			$comments = $this->commentsModel->selectByPost($_GET['id']);
			$post = $this->postsModel->select($_GET['id']);
		} else {
			$comments = $this->commentsModel->selectByPost($_GET['id'] = 1);
			$post = $this->postsModel->select($_GET['id'] = 1);
		}

		if(isset($_POST['send_report'])){
			$this->commentsModel->report([$_POST['report']]);
		}

		if(isset($_POST['send_comment'])){
			if(!empty($_POST['pseudo']) && !empty($_POST['text'])) {
				$this->commentsModel->add([
					':post_id' => $_GET['id'],
					':pseudo' => $_POST['pseudo'],
					':comment' => $_POST['text']
				]);
				header('location: index.php?p=comments&id='. $_GET['id']);
			}
		}

		if(isset($_POST['delete_comment'])){
			$this->commentsModel->delete([$_POST['delete']]);
			header('location: index.php?p=comments&id='. $_GET['id']);
		}

		$this->renderFrontend('comments', compact('comments', 'post'));
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