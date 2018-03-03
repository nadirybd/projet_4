<?php
namespace App\Controller\User;

use Core\Controller\Controller;
/**
* Class UserController
*/
class UserController extends Controller
{
	/**
	* Variable $_instance qui stocke sa propre instance 
	* $viewPath stockera un nom de dossier 
	*/
	private static $_instance;
	protected $viewPath = 'user';

	/**
	* Méthode qui fera la transmission entre le model et la vue login 
	*/
	public function login(){
		$error = false;
		if(!empty($_POST)){
			if($this->auth->login($_POST['user'], $_POST['pass'])){
				header('location: index.php?p=admin');
			} else {
				$error = true;
			}
		}
		$this->render('login', compact('error'));
	}

	/**
	* Méthode qui fera la transmission entre le model et la vue account
	*/
	public function account(){

		$error = false;
		$pass = $this->auth->verify($_SESSION['auth']);
		if(!empty($_POST) && isset($_POST['user-info'])){
			if(password_verify($_POST['old_pass'], $pass->password)){
				$this->auth->account([
					':name' => $_POST['admin_name'],
					':password' => password_hash($_POST['new_pass'], PASSWORD_BCRYPT)
				]);
				$_SESSION['auth'] = $_POST['admin_name'];
				header('location: index.php?p=admin.account');
			} else {
				$error = true;
			}
		}
		$this->render('account', compact('error', 'pass'));
	}

	/**
	* Méthode qui fera la transmission entre le model et la vue forbidden
	*/
	public function forbidden(){

		$this->render('forbidden');
	}

	/**
	* Méthode qui fera la transmission entre le model et la vue disconnect
	*/
	public function disconnect(){
		unset($_SESSION['auth']);
		header('location: index.php');
		$this->render('disconnect');
	}

	/**
	* Méthode qui fera la transmission entre le model et la vue 404
	*/
	public function notFound(){
		header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
		require("View/user/errors/404.php");
		exit();
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