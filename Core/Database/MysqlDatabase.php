<?php 
namespace Core\Database;
use \PDO;
/**
* Class MysqlDatabase qui hérite de Database et gère la connexion à la 
* base de données MySQL
*/
class MysqlDatabase extends Database
{
 	/**
	* $_instance variable qui permettra de vérifier l'existance d'une 
	* instance en cours (Si non de stocker l'instanciation) 
	*/
	private static $_instance;

	/**
	* @return self::$_instance qui stock une instanciation de MysqlDatabase
	*/
	public static function getInstance(){
		if(self::$_instance === null){
			return self::$_instance = new MysqlDatabase();
		}
		return self::$_instance;
	}

	/**
	* @param $statement prend en paramètre le statement
	* @param $one prend en paramètre la variable $one qui renvoi true ou 
	* false
	* @return $data obj stdClass
	*/
	public function query($statement, $one = null){
		$req = $this->getDb()->query($statement);
		if($one === null){
			$data = $req->fetchAll(PDO::FETCH_OBJ);
			return $data; 
		} else {
			$data = $req->fetch(PDO::FETCH_OBJ);
			return $data; 
		}
	}

	/**
	* @param $statement str prend en paramètre le statement
	* @param $attributes prend en paramètre les attributes à executer
	* @param $one boolean prend en paramètre la variable $one qui renvoi 
	* true ou false
	* @return $data obj stdClass
	*/
	public function prepare($statement, $attributes, $one = null){
		$req = $this->getDb()->prepare($statement);
		$req->execute($attributes);
		if($one){
			$data = $req->fetch(PDO::FETCH_OBJ);
			return $data; 
		}
		return $req;
	}
}