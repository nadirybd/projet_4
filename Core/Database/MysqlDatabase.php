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
}