<?php
/**
* Class App qui gère des fonctionnalités générales de l'application
*/
class App
{
	/**
	* Méthode load qui chargera les autoloaders présents dans les 
	* différents dossiers et crée une session 
	*/
	public static function load(){
		session_start();
		require('Core/Autoloader.php');
		Core\Autoloader::register();
		require('Autoloader.php');
		App\Autoloader::register();
	}
}