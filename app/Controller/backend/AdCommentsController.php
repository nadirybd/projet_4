<?php
namespace App\Controller\Backend;
use Core\Controller\Controller;
/**
* Class AdCommentsController
*/
class AdCommentsController extends Controller
{	
	/**
	* $_instance variable qui stocke une instance
	* $viewPath stockera un nom de dossier 
	*/
	private static $_instance;
	protected $viewPath = 'backend';

	/**
	* 
	*/
	public function admin(){
		$comments = $this->commentsModel->selectByReport();
		if(isset($_POST['send_delete'])){
			$this->commentsModel->delete([$_POST['delete']]);
			header('location: index.php?p=admin');
		}
		if(isset($_POST['pull_report'])){
			$this->commentsModel->pullReport([$_POST['remove_report']]);
			header('location: index.php?p=admin');
		}
		$this->render('admin', compact('comments'));
	}

	/**
	* @return l'instance stocké dans la variable $_instance
	*/
	public static function getInstance(){
		if(self::$_instance === null){
			return self::$_instance = new AdCommentsController();
		}
		return self::$_instance;
	}
}