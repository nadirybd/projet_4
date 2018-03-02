<?php
namespace Core\Model;
use Core\Database\MysqlDatabase;
/**
* Class Model 
*/
class Model
{
	protected $MySql;

	/**
	* __construct crée une instance de Mysqldatabase en la stockant dans 
	* la variable $this->MyzSql;
	*/
	public function __construct(){
		if($this->MySql === null){
			$this->MySql = MysqlDatabase::getInstance();
		}
	}
}