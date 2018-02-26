<?php
require('app/App.php');
App::load();

use App\Controller\Frontend\PostsController;
use App\Controller\Frontend\CommentsController;

if(!empty($_GET['p']) && isset($_GET['p'])){
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
elseif ($page === 'comments') {
	CommentsController::getInstance()->comments();
}
