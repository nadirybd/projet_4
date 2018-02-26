<?php
namespace Core\Database;
/**
* Class Database qui gère la connexion à la base de données
*/
class Database
{
	protected $db_host = 'localhost';
	protected $db_name = 'test';
	protected $db_user = 'root';
	protected $db_pass = 'root';
	
	public function __construct($dbhost, $dbname, $dbuser, $dbpass){
		$this->db_host = $dbhost;
		$this->db_name = $dbname;
		$this->db_user = $dbuser;
		$this->db_pass = $dbpass;
	}
}