<?php
define('ROOT', dirname(__DIR__));
require('app/App.php');
App::load();

use App\Controller\Frontend\PostsController;

if(isset($_GET['p'])){
	$page = $_GET['p'];
} else {
	$page = 'home'; 
}
 
if($page === 'home'){
	PostsController::getInstance()->home();
}
elseif ($page === 'post') {
	PostsController::getInstance()->post_comments();
}
