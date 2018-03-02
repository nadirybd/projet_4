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
	* $viewPath stockera un nom de dossier 
	*/
	private static $_instance;
	protected $viewPath = 'frontend';

	/**
	* Méthode comments qui affiche les commentaires par post et effectue la logiqe entre les models et la vue
	*/
	public function comments(){
		$max = $this->postsModel->max();
		$min = $this->postsModel->min();
		$error = false;
		if(isset($_GET['id']) && intval($_GET['id']) && $_GET['id'] > 0 && $_GET['id'] <= $max->maxId){
			$comments = $this->commentsModel->selectByPost($_GET['id']);
			$post = $this->postsModel->select([$_GET['id']]);
			if(!is_object($post)){
				$_GET['id'] = $min->minId;
				$post = $this->postsModel->select([$_GET['id']]);
			}
		} else {
			$_GET['id'] = $min->minId;
			$comments = $this->commentsModel->selectByPost($_GET['id']);
			$post = $this->postsModel->select($_GET['id']);
		}

		if(isset($_POST['send_report'])){
			$this->commentsModel->report([$_POST['report']]);
		} 
		elseif(isset($_POST['send_comment'])){
			if(!empty($_POST['pseudo']) && !empty($_POST['text']) && strlen($_POST['pseudo']) <= 25) {
				$this->commentsModel->add([
					':post_id' => $_GET['id'],
					':pseudo' => $_POST['pseudo'],
					':comment' => $_POST['text']
				]);
				header('location: index.php?p=comments&id='. $_GET['id']);
			} else {
			 	$error = true;
			}
		} 
		elseif(isset($_POST['delete_comment'])){
			$this->commentsModel->delete([$_POST['delete']]);
			header('location: index.php?p=comments&id='. $_GET['id']);
		}

		$this->render('comments', compact('comments', 'post', 'error'));
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