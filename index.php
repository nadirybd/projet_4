<?php 
require('app/App.php');
App::load();

use App\Controller\User\UserController;

use App\Controller\Frontend\PostsController;
use App\Controller\Frontend\CommentsController;

use App\Controller\Backend\AdPostsController;
use App\Controller\Backend\AdCommentsController;

use App\Model\User\Auth;
$user = new Auth();

if(!empty($_GET['p']) && isset($_GET['p'])){
	$page = $_GET['p'];
} else {
	$page = 'home';
}

if($page === 'home'){
	if(!isset($_GET['page'])){
		$_GET['page'] = 1;
	}
	PostsController::getInstance()->home();
}
elseif ($page === 'post') {
	PostsController::getInstance()->post();
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
			AdCommentsController::getInstance()->admin();
		}  
		elseif ($page === 'admin.disconnect') {
			UserController::getInstance()->disconnect();
		}
		elseif ($page === 'admin.posts') {
			if(!isset($_GET['page'])){
				$_GET['page'] = 1;
			}
			AdPostsController::getInstance()->adminPosts();
		}
		elseif ($page === 'admin.post.edit') {
			AdPostsController::getInstance()->postEdit();
		}
		elseif ($page === 'admin.add.post') {
			AdPostsController::getInstance()->addPost();
		}
		elseif ($page === 'admin.account') {
			UserController::getInstance()->account();
		} else {
			UserController::getInstance()->notFound();
		}
	} else {
		UserController::getInstance()->forbidden();
	}
} else {
	UserController::getInstance()->notFound();
}