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
		if(isset($_POST['send_delete'])){
			$this->postsModel->delete([':id' => $_POST['delete']]);
			$this->commentsModel->deleteByPostId([':post_id' => $_POST['delete']]);
			header('location: index.php?p=admin.posts');
		}
		$this->renderBackend('admin-posts', compact('posts'));
	}

	/**
	*
	*/
	public function postEdit(){
		if(isset($_GET['id']) && !empty($_GET['id']) && intval($_GET['id'])){
			$post = $this->postsModel->select([$_GET['id']]);
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
	public function addPost(){
		if(isset($_POST['add'])){
			$this->postsModel->add([
				':title' => $_POST['addTitle'],
				':content' => $_POST['addContent']
			]);
		header('location: index.php?p=admin.posts');
		}
		$this->renderBackend('admin-add-post');
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