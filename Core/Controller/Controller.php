<?php
namespace Core\Controller;
/**
* Class Controller
*/
class Controller
{	
	/**
	* $postsModel stockera une instance de la classe PostsModel
	* $commentsModel stockera une instance de la classe CommentsModel
	* $auth stockera une instance de la classe Auth
	* $viewPath stockera un nom de dossier 
	*/
	protected $postsModel;
	protected $commentsModel;
	protected $auth;
	
	protected $viewPath;

	/**
	* __construct créera des instances de :
	* la classe PostsModel est sera stocké dans la variable $postsModel
	* la classe CommentsModel est sera stocké dans la variable 
	* $commentsModel
	* la classe Auth est sera stocké dans la variable $auth
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
	* @param [$array compact()] 
	*/
	protected function render($view, $array = null){
		ob_start();
		if($array !== null){
			extract($array);
		}
		require('View/'. $this->viewPath .'/'. $view .'.php');
		$content = ob_get_clean();
		require('View/templates/default.php');
	}
}