<?php
require('app/App.php');
App::load();

use App\Controller\User\UserController;

use App\Controller\Frontend\PostsController;
use App\Controller\Frontend\CommentsController;

use App\Controller\Backend\AdPostsController;

use App\Model\User\Auth;
$user = new Auth();

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
elseif ($page === 'login') {
	UserController::getInstance()->login();
}
elseif(strpos($page, 'admin') === 0){
	if($user->logged()){

		if($page === 'admin'){
			AdPostsController::getInstance()->admin();
		}  elseif ($page === 'admin.disconnect') {
			UserController::getInstance()->disconnect();
		}

	} else {
		UserController::getInstance()->forbidden();
	}
}