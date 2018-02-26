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
	* __construct créee une instance de Mysqldatabase en la stocke dans la * variable a$MySql;
	*/
	public function __construct(){
		if($this->MySql === null){
			$this->MySql = MysqlDatabase::getInstance();
		}
	}
}