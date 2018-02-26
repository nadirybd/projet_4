<?php
namespace Core\Database;
/**
* Class Database qui gère la connexion à la base de données
*/
class Database
{
	/**
	* $dbhost récupère le nom serveur  
	* $dbname récupère le nom de la base de données 
	* $dbuser récupère l'identifiant de la connexion à la database 
	* $dbpass récupère le mot de passe de la connexion à la database 
	*/
	protected $db_host;
	protected $db_name;
	protected $db_user;
	protected $db_pass;
	
	/**
	* @param $dbhost assigne le serveur nécessaire pour la connexion à
	* la base de données 
	* @param $dbname assigne le nom de la base de données nécessaire pour
	* la connexion à la base de données 
	* @param $dbuser assigne l'identifiant nécessaire pour la connexion à
	* la base de données 
	* @param $dbpass assigne le mot de passe nécessaire pour la connexion à
	* la base de données  
	*/
	public function __construct($dbhost = 'localhost', $dbname = 'test', $dbuser = 'root', $dbpass = 'root'){
		$this->db_host = $dbhost;
		$this->db_name = $dbname;
		$this->db_user = $dbuser;
		$this->db_pass = $dbpass;
	}

	/**
	* @return $db variable qui se connecte à la base de données
	*/
	public function getDb(){
		$db = new PDO('mysql:host='. $this->db_host .';dbname='. $this->db_name .';charset=utf8', $this->db_user, $this->db_pass);
		return $db;
	}
}