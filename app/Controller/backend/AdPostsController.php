<?php
namespace App\Controller\Backend;

use Core\Controller\Controller;

/**
* Class PostsController spécifique au backend
*/
class AdPostsController extends Controller
{
	/**
	*
	*/
	private static $_instance;

	/**
	*
	*/
	public function adminPosts(){
		$posts = $this->postsModel->all();
		$this->renderBackend('admin-posts', compact('posts'));
	}

	/**
	*
	*/
	public function postEdit(){
		if(isset($_GET['id']) && !empty($_GET['id']) && intval($_GET['id'])){
			$post = $this->postsModel->select($_GET['id']);
		} else {
			header('location: index.php?p=admin');
		}

		if(isset($_POST['edit'])){
			$this->postsModel->update([
				':title' => $_POST['title'],
				':content' => $_POST['content'],
				':id' => $_POST['id']
			]);
			header('location: index.php?p=admin.posts');
		}

		$this->renderBackend('admin-post-edit', compact('post'));
	}

	/**
	*
	*/
	public static function getInstance(){
		if(self::$_instance === null){
			return self::$_instance = new AdPostsController();
		}
		return self::$_instance;
	}
}