<?php 
namespace Core\Database;
use \PDO;
/**
* Class MysqlDatabase qui hérite de Database et gère la connexion à la 
* base de données MySQL
*/
class MysqlDatabase extends Database
{
	public function getDb(){
		$db = new PDO('mysql:host='. $this->db_host .';dbname='. $this->db_name .';charset=utf8', $this->db_user, $this->db_pass);
		return $db;
	}
}