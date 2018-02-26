<?php
require('app/App.php');
App::load();

if(isset($_GET['p'])){
	$page = $_GET['p'];
} else {
	$page = 'home'; 
}

if($page === 'home'){
	
}