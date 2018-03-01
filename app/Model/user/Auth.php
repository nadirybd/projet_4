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
			if(password_verify($password, $user->password)){
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

	public function account($attributes){
		$account = $this->MySql->prepare('UPDATE user SET name = :name, password = :password', $attributes);
		return $account;
	}

	public function verify($name){
		$pass = $this->MySql->query('SELECT name, password FROM user WHERE name="'. $name.'"', true);
		return $pass;
	}
}