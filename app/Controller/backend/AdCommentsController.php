<?php
namespace App\Controller\Backend;
use Core\Controller\Controller;
/**
* Class AdCommentsController
*/
class AdCommentsController extends Controller
{
	private static $_instance;

	public function admin(){
		$comments = $this->commentsModel->selectByReport();
		$this->renderBackend('admin', compact('comments'));
	}

	public static function getInstance(){
		if(self::$_instance === null){
			return self::$_instance = new AdCommentsController();
		}
		return self::$_instance;
	}
}