<?php
namespace Core;
/**
* Class Autoloader qui charge de façon dynamique les classes
*/
class Autoloader
{
	/**
	* @param $class prend en paramètre la classe
	* méthode qui fait un require des classes dynamiquement 
	*/
	private static function autoload($class){
		if(strpos($class, __NAMESPACE__ . '\\') === 0){
			$class = str_replace(__NAMESPACE__ . '\\', '', $class);
			require __DIR__ . '/' . $class . '.php';
		}
	}

	/**
	* Méthode qui utilise la fonction spl_autoload_register
	* Permet d'utiliser plusieurs fois la méthode autoload
	*/
	public static function register(){
		spl_autoload_register(array (__CLASS__, 'autoload'));
	} 

}