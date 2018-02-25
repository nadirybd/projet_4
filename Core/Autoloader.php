<?php
namespace Core;
/**
* Class Autoloader qui charge de façon dynamique les classes
*/
class Autoloader
{

	public static function register(){
		spl_autoload_register('autoload');
	} 

	/**
	* @param $class prend en paramètre la class
	*/
	private function autoload($class){
		if(strpos($class, __NAMESPACE . '\\') === 0){
			$class = str_replace(__NAMESPACE__ . '\\', '', $class);
			require __DIR__ . '/' . $class . '.php';
		}
	}
}