<?php
class gallery_area extends Controller
{
	function __construct()
	{
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedin');
		if ($logged == false) {
			Session::destroy();
			header('location:' . URL);
			exit();
		} else {
			$this->user->data();
		}
		$this->view->js = array('gallery_area/default.js');

	}

	function Index()
	{

		$this->view->render('gallery_area/index');

	}

	function get_user_info()
	{

		$this->view->user = $this->user->get_user_info();

	}
	function get_user_news($id)
	{

		$this->view->user = $this->user->get_user_news($id);

	}
	function get_user_firstname()
	{

		$this->user->get_user_firstname();

	}
	function get_user_friends_data()
	{
		$this->user->get_user_friends_data();

	}
	function get_file_existance()
	{
		$this->user->get_file_existance();

	}


	function logout()
	{
		Session::destroy();
		header('location:' . URL);
		exit;

	}

	function like()
	{
		$this->user->like();

	}
	function like_remove()
	{
		$this->user->like_remove();

	}
	function fetch_like()
	{
		$this->user->fetch_like();

	}
	function fetch_like_all()
	{
		$this->user->fetch_like_all();

	}
	function dislike()
	{
		$this->user->dislike();

	}
	function dislike_remove()
	{
		$this->user->dislike_remove();

	}
	function fetch_dislike()
	{
		$this->user->fetch_dislike();

	}
	function fetch_dislike_all()
	{
		$this->user->fetch_dislike_all();

	}
	function delete_post()
	{

		$this->user->delete_post();

	}
	function share_post()
	{

		$this->user->share_post();

	}

	function publishPost()
	{

		$this->model->publishPost();
	}

	function addImage_media()
	{
		$this->model->addImage_media();
	}



	function get_album()
	{

		$this->user->get_album();

	}
	function get_online()
	{

		if (isset($_POST['data'])) {
			$this->user->get_active_user();
		}

	}
}
?>