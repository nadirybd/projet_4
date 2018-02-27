<?php
namespace Core\Controller;
/**
* Class Controller
*/
class Controller
{
	protected $postsModel;
	protected $commentsModel;
	protected $auth;

	/**
	* __construct crée une instance de Posts en la stocke dans la * variable a$MySql;
	*/
	public function __construct(){
		if($this->postsModel === null){
			$this->postsModel = new \App\Model\PostsModel;
		}
		if($this->commentsModel === null){
			$this->commentsModel = new \App\Model\CommentsModel;
		}
		if($this->auth === null){
			$this->auth = new \App\Model\User\Auth;
		}
	}

	/**
	* @param $view str
	* @param $array compact()
	*/
	protected function renderFrontend($view, $array){
		ob_start();
		extract($array);
		require('View/frontend/'. $view .'.php');
		$content = ob_get_clean();
		require('View/templates/default.php');
	}

	/**
	* @param $view str
	* @param $array compact()
	*/
	protected function renderBackend($view, $array){
		ob_start();
		extract($array);
		require('View/backend/'. $view .'.php');
		$content = ob_get_clean();
		require('View/templates/default.php');
	}

	/**
	* @param $view str
	* @param $array compact()
	*/
	protected function renderUser($view, $array = null){
		ob_start();
		if($array !== null){
			extract($array);
		}
		require('View/user/'. $view .'.php');
		$content = ob_get_clean();
		require('View/templates/default.php');
	}
}