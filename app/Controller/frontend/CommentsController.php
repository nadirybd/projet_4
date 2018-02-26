<?php
namespace App\Controller\Frontend;
use Core\Controller\Controller;
/**
* CommentsController
*/
class CommentsController extends Controller
{
	private static $_instance;

	public function comments(){
		$max = $this->postsModel->max();

		if(isset($_GET['id']) && intval($_GET['id']) && $_GET['id'] >= 1 && $_GET['id'] <= $max->maxId){
			$comments = $this->commentsModel->selectByPost($_GET['id']);
		} else {
			$comments = $this->commentsModel->selectByPost($_GET['id'] = 1);
		}
		$this->renderFrontend('comments', compact('comments'));
	}

	public static function getInstance(){
		if(self::$_instance === null){
			return self::$_instance = new CommentsController();
		}
		return self::$_instance;
	}
}