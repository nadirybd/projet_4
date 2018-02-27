<?php
namespace App\Controller\User;

use Core\Controller\Controller;
/**
* Class UserController
*/
class UserController extends Controller
{
	/**
	* $_instance variable qui stocke une instance 
	*/
	private static $_instance;

	public function login(){
		$error = false;
		if(!empty($_POST)){
			if($this->auth->login($_POST['user'], $_POST['pass'])){
				header('location: index.php?p=admin');
			} else {
				$error = true;
			}
		}
		$this->renderUser('login', compact('error'));
	}

	public function forbidden(){
		$this->renderUser('forbidden');
	}

	/**
	* @return l'instance stocké dans la variable $_instance
	*/
	public static function getInstance(){
		if(self::$_instance === null){
			return self::$_instance = new UserController();
		}
		return self::$_instance;
	}
}