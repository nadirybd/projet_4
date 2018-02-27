<?php
namespace App\Model\User;
use Core\Model\Model;
/**
* Class Auth qui gère l'authentification 
*/
class Auth extends Model
{
	public function login($username, $password){
		$user = $this->MySql->prepare('SELECT * FROM user WHERE name = ?', [$username], true);
		if($user){
			if($user->password === sha1($password)){
				$_SESSION['auth'] = $user->name;
				return true;
			}
		}	
		return false;
	}

	public function logged(){
		if(isset($_SESSION['auth'])){
			return true;
		}
		return false;
	}
}