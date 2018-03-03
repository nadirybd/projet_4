<?php
namespace App\Controller\Backend;

use Core\Controller\Controller;

/**
* Class PostsController spécifique au backend
*/
class AdPostsController extends Controller
{
	/**
	* $_instance variable qui stocke une instance
	* $viewPath stockera un nom de dossier 
	*/
	private static $_instance;
	protected $viewPath = 'backend';

	/**
	* Méthode adminPosts affiche les posts et gère la logique entre les models et la vue
	*/
	public function adminPosts(){
		$posts_per_page = 6;
		$posts_selected = $this->postsModel->all();
		$number_of_posts = count($posts_selected);
		$number_of_pages = ceil($number_of_posts / $posts_per_page);
		$current_page = $_GET['page'];

		if(intval($_GET['page']) && isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $number_of_pages){
			$from = $posts_per_page * ($_GET['page'] - 1);
			$posts = $this->postsModel->postsLimit($from, $posts_per_page);
		} else {
			$_GET['page'] = 1;
			$from = $posts_per_page * ($_GET['page'] - 1);
			$posts = $this->postsModel->postsLimit($from, $posts_per_page);
		}

		if(isset($_POST['send_delete'])){
			$this->postsModel->delete([':id' => $_POST['delete']]);
			$this->commentsModel->deleteByPostId([':post_id' => $_POST['delete']]);
			header('location: index.php?p=admin.posts&page='. $_GET['page']);
		}
		$this->render('admin-posts', compact('posts', 'number_of_pages', 'current_page'));
	}

	/**
	* Méthode postEdit affiche le post, donne la possibilité à éditer un post et gère la logique entre les models et la vue
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

		$this->render('admin-post-edit', compact('post'));
	}

	/**
	* Méthode addPost ajoute la possibilité d'ajouter un post et gère la logique entre les models et la vue 
	*/
	public function addPost(){
		if(isset($_POST['add'])){
			$this->postsModel->add([
				':title' => $_POST['addTitle'],
				':content' => $_POST['addContent']
			]);
		header('location: index.php?p=admin.posts');
		}
		$this->render('admin-add-post');
	}

	/**
	* @return la variable $_instance qui stocke une instanciation de la classe
	*/
	public static function getInstance(){
		if(self::$_instance === null){
			return self::$_instance = new AdPostsController();
		}
		return self::$_instance;
	}
}