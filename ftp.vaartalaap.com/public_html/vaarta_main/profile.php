<?php
class profile extends Controller
{

	function __construct($data = false)
	{

		parent::__construct();
		Session::init();
		$logged = Session::get('loggedin');
		if ($logged == false) {
			Session::destroy();
			header('location:' . URL);
			exit();
		} else {
			     //$this->user->data();			
		}

		if ($data == true) {
			$this->view->js = array('profile/default.js');
			$this->view->data_profile = $data;
		}



	}

	function Index($hello)
	{
		$this->view->render('profile/index');


	}
	function get_user_info()
	{
		if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], URL) !== false) {
			if (isset($_POST['the_user_id'])) {
				$id = $_POST['the_user_id'];
				$this->view->user = $this->user->get_user_info($id);
			} else {
				echo "You should not be here.";
			}
		} else {
			echo "You should not be here.";
		}
	}
	function check_follow_if()
	{
		if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], URL) !== false) {
			if (isset($_POST['profile_data'])) {
				$user_check = $_POST['profile_data'];
				$this->model->check_follow($user_check);
			} else {
				echo "You should not be here.";
			}
		} else {
			echo "You should not be here.";
		}
	}
	function get_user_firstname($name)
	{
		$token_value = csrf::get_token_csrf();
		$_POST['csrf_val'] = $token_value;
		$this->user->get_user_firstname($name);
	}


	function friends_of_pro()
	{
		if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], URL) !== false) {
			if (isset($_POST['profile_data'])) {
				$name = $_POST['profile_data'];
				$this->user->friends_of_pro($name);
			} else {
				echo "You should not be here.";
			}
		} else {
			echo "You should not be here.";
		}

	}
	function followers_of_pro()
	{
		if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], URL) !== false) {
			if (isset($_POST['profile_data'])) {
				$name = $_POST['profile_data'];
				$this->user->followers_of_pro($name);
			} else {
				echo "You should not be here.";
			}
		} else {
			echo "You should not be here.";
		}
	}
	function image_data()
	{
		if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], URL) !== false) {
			if (isset($_POST['profile_data'])) {
				$name = $_POST['profile_data'];

				$this->user->image_data($name);
			} else {
				echo "You should not be here.";
			}
		} else {
			echo "You should not be here";
		}
	}

	function check_file()
	{
		if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], URL) !== false) {
			$this->user->check_file();
		} else {
			echo "You should not be here";
		}
	}

	function get_file_existance()
	{
		if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], URL) !== false) {
			$this->user->get_file_existance();
		} else {
			echo "You should not be here";
		}
	}
	function get_user_friends_data()
	{
		if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], URL) !== false) {
			$this->user->get_user_friends_data();
		} else {
			echo "You should not be here";
		}
	}
	function profile_pic()
	{
		if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], URL) !== false) {
			$this->view->profile_pic = $this->user->get_profile_pic();
		} else {
			echo "You should not be here";
		}
	}

	function update_data($theData)
	{
		if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], URL) !== false) {

			$this->model->update_data($theData);
		} else {
			echo "You should not be here";
		}
	}
	function update_data_of_info($theData)
	{
	//echo $_SERVER['HTTP_REFERER']." ".URL;
		if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], URL) !== false) {
	//echo "yes";
			$this->model->update_data_of_info($theData);
		} else {
			echo "You should not be here";
		}
	}

	function update__profile_image($theData)
	{
		if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], URL) !== false) {
			$this->model->update__profile_image($theData);
		} else {
			echo "You should not be here";
		}
	}
	function remove__profile_image($theData)
	{
		if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], URL) !== false) {
			$this->model->remove__profile_image($theData);
		} else {
			echo "You should not be here";
		}
	}
	function send_request()
	{
		if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], URL) !== false) {
			$this->model->send_request();
		} else {
			echo "You should not be here";
		}
	}

	function cancel_request()
	{
		if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], URL) !== false) {
			$this->model->cancel_request();
		} else {
			echo "You should not be here";
		}
	}

	function follow($idiot)
	{
		if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], URL) !== false) {
			$this->model->follow_the_user($idiot);
		} else {
			echo "You should not be here";
		}
	}
	function check_relation()
	{
		if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], URL) !== false) {
			$this->model->check_relation();
		} else {
			echo "You should not be here";
		}
	}
	function get_cid_from_user()
	{
		if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], URL) !== false) {
			$this->model->get_cid_from_user();
		} else {
			echo "You should not be here";
		}
	}
	function logout()
	{
		if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], URL) !== false) {
			Session::destroy();
			header('location:' . URL);
			exit;
		} else {
			echo "You should not be here";
		}
	}



}
?>