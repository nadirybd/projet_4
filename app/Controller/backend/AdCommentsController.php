<?php
namespace App\Controller\Backend;
use Core\Controller\Controller;
/**
* Class AdCommentsController
*/
class AdCommentsController extends Controller
{	
	/**
	* variable static $_instance qui stocke une instance
	*/
	private static $_instance;

	/**
	* 
	*/
	public function admin(){
		$comments = $this->commentsModel->selectByReport();
		if(isset($_POST['send_delete'])){
			$this->commentsModel->delete([$_POST['delete']]);
			header('location: index.php?p=admin');
		}
		$this->renderBackend('admin', compact('comments'));
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