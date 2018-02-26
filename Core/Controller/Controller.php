<?php
namespace Core\Controller;
/**
* Class Controller
*/
class Controller
{
	protected $postsModel;

	/**
	* __construct créee une instance de Posts en la stocke dans la * variable a$MySql;
	*/
	public function __construct(){
		if($this->model === null){
			$this->postsModel = new \App\Model\PostsModel;
		}
	}

	protected function render(){
		
	}
}