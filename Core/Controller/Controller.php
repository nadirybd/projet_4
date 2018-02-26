<?php
namespace Core\Controller;
/**
* Class Controller
*/
class Controller
{
	protected $postsModel;
	protected $commentsModel;

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
	}

	protected function render($view, $array){
		ob_start();
		extract($array);
		require('View/frontend/'. $view .'.php');
		$content = ob_get_clean();
		require('View/templates/default.php');
	}
}