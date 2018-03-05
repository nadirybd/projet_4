<?php
namespace App\Controller\Frontend;
use Core\Controller\Controller;
/**
* PostsController
*/
class PostsController extends Controller
{
	/**
	* $_instance variable qui stocke une instance
	* $viewPath stockera un nom de dossier 
	*/
	private static $_instance;
	protected $viewPath = 'frontend';

	/**
	* Méthode home qui affiche tous les posts dans une pagination et effectue la logique entre les models et la vue
	*/
	public function home(){

		$posts_per_page = 5;
		$posts_selected = $this->postsModel->all();
		$number_of_posts = count($posts_selected);
		$number_of_pages = ceil($number_of_posts / $posts_per_page);
		
		if(intval($_GET['page']) && isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $number_of_pages){
			$from = $posts_per_page * ($_GET['page'] - 1);
			$posts = $this->postsModel->postsLimit($from, $posts_per_page);
		} else {
			$_GET['page'] = 1;
			$from = $posts_per_page * ($_GET['page'] - 1);
			$posts = $this->postsModel->postsLimit($from, $posts_per_page);
		}

		$current_page = $_GET['page'];

		
		$this->render('home', compact('posts', 'posts_per_page', 'number_of_posts', 'number_of_pages', 'current_page'));
	}

	/**
	* Méthode post_comments qui affiche le post selectionné et les 
	 commentaires par post et effectue la logique entre les models et la vue
	*/
	public function post(){
		$max = $this->postsModel->max();
		$min = $this->postsModel->min();

		if(isset($_GET['id']) && intval($_GET['id']) && $_GET['id'] > 0 && $_GET['id'] <= $max->maxId){
			$post = $this->postsModel->select([$_GET['id']]);
			if(!is_object($post)){
				$_GET['id'] = $min->minId;
				$post = $this->postsModel->select([$_GET['id']]);
			}
			$comments = $this->commentsModel->showByLimit($_GET['id']);
		} else {
			$_GET['id'] = $min->minId;
			$post = $this->postsModel->select([$_GET['id']]);
			$comments = $this->commentsModel->showByLimit($_GET['id']);
		}

		if(isset($_POST['send_report'])){
			$this->commentsModel->report([$_POST['report']]);
		}
		elseif(isset($_POST['delete_comment'])){
			$this->commentsModel->delete([$_POST['delete']]);
				header('location: index.php?p=post&id='. $_GET['id']);
		}
		
		$this->render('post', compact('post', 'max', 'comments'));
	}

	public function search(){
		if(isset($_POST['send-search'])){
			if(!empty($_POST['q']) && strlen($_POST['q']) > 3){
				$searchPost = $this->postsModel->searchPost(addslashes(htmlspecialchars($_POST['q'])));
				if(count($searchPost) === 0 ){
					$unknown = 'Aucun résultat pour : ' . htmlspecialchars($_POST['q']);
				}
			} else {
				header('location: index.php?p=home');
			}
		}
		$this->render('search', compact('searchPost','unknown'));
	}

	/**
	* @return l'instance stocké dans la variable $_instance
	*/
	public static function getInstance(){
		if(self::$_instance === null){
			return self::$_instance = new PostsController();
		}
		return self::$_instance;
	}
}
