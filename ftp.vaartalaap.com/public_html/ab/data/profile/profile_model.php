<?php
class profile_model extends Models
{
	public function __construct()
	{
		parent::__construct();

	}
	public function profile_user()
	{

	}


	public function update_data($data)
	{
		$user = Session::get('user');
		$id = Session::get('id');
		$update = $_POST['data'];

		$check_user = $this->db->select('user_id', 'info_users', "user_id='$id'");
		$count = $check_user->rowCount();
		if ($count == 1) {
			echo $data;
		//if user is already in database
			if ($data == 'q') {
				$update = $this->db->update("info_users", "fav_quote='$update'", "user_id='$id'");
			} elseif ($data == 'h') {
				$update = $this->db->update("info_users", "hobby='$update'", "user_id='$id'");
			} elseif ($data == 'w') {
				$update = $this->db->update("info_users", "about_you='$update'", "user_id='$id'");

			} elseif ($data = 'said') {
				$update = $this->db->update("info_users", "said_by='$update'", "user_id='$id'");
			} else {
				echo "Go to hell ";
			}
	
	//if User info is not already inserted//
		} else {
	//		 echo $data;
			$insert = null;
			if ($data == 'q') {
				$insert = $this->db->insert("info_users (user_id,fav_quote)", "('$id','$update')");
			} elseif ($data == 'h') {
				$insert = $this->db->insert("info_users (user_id,hobby)", "('$id','$update')");
			} elseif ($data == 'w') {
				$insert = $this->db->insert("info_users (user_id,about_you)", "('$id','$update')");

			} elseif ($data = 'said') {
				$insert = $this->db->insert("info_users (user_id,said_by)", "('$id','$update')");
			} else {
				echo "Go to hell ";
			}
			if (!$insert) {
				echo "problem";
			}
		}


	}

	public function update_data_of_info($data)
	{

		$user = Session::get('user');
		$id = Session::get('id');
		$update = $_POST['data'];
		$update2 = $_POST['data_sir'];
		echo $data;
		if ($data == 'f_n') {
			$update = $this->db->update("myusers", "first_name='$update'", "id='$id'");
			$update = $this->db->update("myusers", "last_name='$update2'", "id='$id'");

		} elseif ($data == 'tag') {
			$update = $this->db->update("myusers", "bio='$update'", "id='$id'");
		} elseif ($data == 'ct') {
			$update = $this->db->update("myusers", "country='$update'", "id='$id'");

		} else {
			echo "Go to hell ";
		}

	}


	public function update__profile_image($theData)
	{

		$username = Session::get('user');
		$id = Session::get('id');
		if (isset($_FILES['profilepic'])) {

			if (((@$_FILES["profilepic"]["type"] == "image/jpeg") || (@$_FILES["profilepic"]["type"] == "image/png") || (@$_FILES["profilepic"]["type"] == "image/gif") || (@$_FILES["profilepic"]["type"] == "image/jpg") || (@$_FILES["profilepic"]["type"] == "image/png")) && (@$_FILES["profilepic"]["size"] < 1048576)) {
				$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
				$rand_dir_name = substr(str_shuffle($chars), 0, 15);
				if (!mkdir("./public/userdata/profile_pics/$rand_dir_name")) {
					echo "Cannot make directory";
				}


				if (file_exists("./public/userdata/profile_pics/$rand_dir_name/" . @$_FILES["profilepic"]["name"])) {
					echo @$_FILES["profilepic"]["name"] . " Already exists";
				} else {
					$temp = explode(".", $_FILES["profilepic"]["name"]);
					$newfilename = round(microtime(true)) . '.' . end($temp);
					move_uploaded_file(@$_FILES["profilepic"]["tmp_name"], "./public/userdata/profile_pics/$rand_dir_name/" . $newfilename);

					$profile_pic_name = @$newfilename;
					$update = $this->db->update("myusers", "profile_pic='$rand_dir_name/$profile_pic_name'", "username='$username'");
					$date_added = date('l\, F jS\, Y ');// Date on added
					$added_by = $username;
					$user_posted_to = $username;
					//$insert = $this->db->insert("posts", "('$username has changed profile pic','$date_added','$added_by','$user_posted_to','$rand_dir_name/$profile_pic_name','')");

					echo $rand_dir_name . '/' . $profile_pic_name;
				}
			} else {
				echo "Invailid File! Your image must be no larger than 1MB and it must be either a .jpg, .jpeg, .png or .gif";
			}
		} else {
			echo "hi";
		}

	}

	public function remove__profile_image($theData)
	{

		$username = Session::get('user');
		$update = $this->db->update("myusers", "profile_pic=''", "username='$username'");


	}
	public function check_relation()
	{

		$from = Session::get('user');

		$user_to = $_POST['data'];
		$select = $this->db->select('*', 'friend_requests', "user_from='$from'&& user_to='$user_to'");
		$select1 = $this->db->select('*', 'friend_requests', " user_from='$user_to'&& user_to='$from'");
		if ($select->rowCount() == 1) {
			echo $from;
		} elseif ($select1->rowCount() == 1) {
			echo $user_to;
		} else {
			echo "";
		}

	}
	public function send_request()
	{

		$from = Session::get('user');
		$user_to = $_POST['data'];
	//	"SELECT* FROM friend_requests WHERE user_from='$username'&& user_to='$username1' or user_to='$username1'&& user_from='$username'"

		$insert = $this->db->insert("friend_requests", "('','$from','$user_to'	)");


	}
	public function cancel_request()
	{

		$from = Session::get('user');
		if (isset($_POST['data'])) {
			$user_to = $_POST['data'];
	//	"SELECT* FROM friend_requests WHERE user_from='$username'&& user_to='$username1' or user_to='$username1'&& user_from='$username'"

			$insert = $this->db->delete("friend_requests", "user_from='$from' && user_to='$user_to' OR user_to='$from' && user_from='$user_to'");
		} else {
			Bootstrap::error();
		}

	}

	public function follow_the_user($idiot)
	{

		$from = Session::get('id');
		$user_id = "";


		if (isset($_POST['uid'])) {
			$user_id = $_POST['uid'];
			$check = $this->db->select('*', 'myusers', "id='$user_id'");
			if ($check->rowCount() == 1) {


				if ($this->check_follow($user_id)) {
					echo "You already follow $user_id";
				} else {
					$insert = $this->db->insert("follow (followed_by,followed_to)", "('$from','$user_id')");
					echo "You have followed $user_id";
				}

			}
		} elseif (isset($_POST['un_id'])) {
			$user_id = $_POST['un_id'];

			$check = $this->db->select('*', 'myusers', "username='$user_id'");
			if ($check->rowCount() == 1) {
				$delete = $this->db->delete("follow", "followed_to='$user_id' && followed_by='$from'");
				echo "You have unfollowed $user_id";
			} else {

				echo "Something went wrong with unfollowing";

			}

		} else {
			Bootstrap::error();
		}

	}



	public function check_follow($user_id)
	{

		$db = new database();

		$from = Session::get('user');
		$check2 = $db->select("*", "follow", "followed_to='$user_id' && followed_by='$from'");
        /*
		if ($check2->rowCount() == 1) {
			echo "yes";
		} else {
			echo "";
		}
		 */


		if ($check2->rowCount() == 1) {
			return true;
		} else {
			return false;
		}

	}


	public function get_cid_from_user()
	{

		if (isset($_POST['pr_id'])) {
			$u_id = Session::get('id');
			$pr_id = $_POST['pr_id'];
			$check = $this->db->select('c_id', 'conversation', "user_one='$pr_id' && user_two='$u_id' || user_one='$u_id' && user_two='$pr_id' ");
			if ($check->rowCount() == 1) {
				$uc_id = $check->fetch();
				echo $uc_id['c_id'];
			} else {
				echo "no Message";
			}
		} else {
			echo "You should not be here.";
		}

	}




}
?>