<?php 
class user extends Models
{
	public function __construct()
	{

	}
// for userprofile data-------------------------------------------------------------------		
	public function data()
	{
		$user = Session::get('user');
	}


     //Function takes user ID and returns user extra info
	public static function get_user_info($user_pr_id = false)
	{
		$db = new database();
		$user = Session::get('user');
		$id = Session::get('id');
		if ($user_pr_id) {
			$check = $db->select("*", 'info_users', "user_id='$user_pr_id' ");
		} else {
			$check = $db->select("*", "info_users", "user_id='$id' ");
		}

		$check->setFetchMode(PDO::FETCH_ASSOC);
		$check->execute();
		$count = $check->rowCount();
		if ($count == 0) {
			echo $count;
		} else {
			$data = $check->fetchAll();
			echo json_encode($data);
		}
	}


	public static function get_user_firstname()
	{
		if (isset($_POST['data_val'])) {

			$db = new database();
			$user = Session::get('user');
			$user_pr = "";
			if (isset($_POST['other_u'])) {
				$user_pr = $_POST['other_u'];
			}
			if ($user_pr) {
		// echo $user_pr;
				$check = $db->select("username,first_name,last_name,profile_pic,country,bio", "myusers", "username='$user_pr' ");
			} else {
				$check = $db->select("first_name,last_name,profile_pic", "myusers", "username='$user' ");
			}
			$check->setFetchMode(PDO::FETCH_ASSOC);
			$check->execute();
	  // $count=$check->rowCount();
			$data = $check->fetchAll();
			echo json_encode($data);
		} else {
			echo "You should not be here";
		}
	}



//------------------------------------------------------------profile data end
//---------------------------------------------------------news data

	public static function check_if_post_exist($id)
	{
		$db = new database();
		//$user = Session::get('id');

		$check = "";

		if ($id) {

			$check = $db->select("*", "posts", " id='$id'") or die(mysqli_error());
			return $check->rowCount();
		}



	}

	public static function get_specific_post($get_check)
	{
//	echo $get_check;


		$db = new database();
		//$user = Session::get('id');



		if (isset($_POST['post_id'])) {
			$last_id = $_POST['last_id'];


			$check = $db->select("*", "posts", " id='$last_id'") or die(mysqli_error());


		} else if ($get_check) {
			$check = $db->select("*", "posts", " id='$get_check'") or die(mysqli_error());

		}



		$check->setFetchMode(PDO::FETCH_ASSOC);
		$check->execute();
		$data = $check->fetchAll();
		echo json_encode($data);



	}





	public static function get_user_news($get_check)
	{
//	echo $get_check;

		if ($get_check == "helloalkddaklfjakldjaksdjaakdjdakljdkjdksjkjakjdksjdakjssjdksdjsa") {
			if (isset($_POST['last_id'])) {
				$last_id = $_POST['last_id'];
			} else {
				$last_id = "nothing";
			}
			$db = new database();
			$user = Session::get('id');
			$friend_data = self::get_user_friends();

			$p = 0;


			if ($last_id == "nothing") {
				$check = $db->select("*", "posts", " added_by='$user' or user_posted_to='$user'
			 ORDER BY id DESC LIMIT 5
			 
			 ") or die(mysqli_error());
			} else {
				$check = $db->select(
					"*",
					"posts ",
					" id<'$last_id' AND (added_by='$user' OR user_posted_to='$user')
				ORDER BY id DESC LIMIT 10"
				) or die(mysqli_error());
			}

			$check->setFetchMode(PDO::FETCH_ASSOC);
			$check->execute();
			$data = $check->fetchAll();
			echo json_encode($data);


		} else {
			echo "If you are bad then I am your dad, Go to Hell";
		}

	}
//--------------------------------------------news data end---------------------------------------
//-------------------------------------------Friends data for news and show----------------


	private static function get_user_friends($user_pro = false)
	{

		$db = new database();
		$user = Session::get('user');
		if (!$user_pro) {
			$check = $db->select("friend_array", "myusers", "username='$user'") or die(mysqli_error());
		} else {
			$check = $db->select("friend_array", "myusers", "username='$user_pro'") or die(mysqli_error());
		}
		$check->setFetchMode(PDO::FETCH_ASSOC);
		$check->execute();
		$data = $check->fetch();
		return $data;



	}

	//Will return the profile pic if you give it username or id of user
	public static function get_user_friends_data()
	{
		if (isset($_POST['added_by'])) {
			$db = new database();

			$name = $_POST['added_by'];
	// if(isset($_POST['this_check'])){	$if_all=$_POST['this_check'];}else{$if_all="";}

			$check = $db->select("profile_pic", "myusers", "username='$name' OR id='$name'");
			$check->setFetchMode(PDO::FETCH_ASSOC);
			$check->execute();
			$data = $check->fetch();
			$value = $data['profile_pic'];
			echo $value;
		} else {
			echo "Do not mess with me . ";
		}

	}


	public static function get_user_friends_name()
	{
		if (isset($_POST['added_by'])) {
			$db = new database();

			$name = $_POST['added_by'];
	// if(isset($_POST['this_check'])){	$if_all=$_POST['this_check'];}else{$if_all="";}

			$check = $db->select("username,first_name,last_name", "myusers", "username='$name' OR id='$name'");
			$check->setFetchMode(PDO::FETCH_ASSOC);
			$check->execute();
			$data = $check->fetch();
			echo json_encode($data);

		} else {
			echo "Do not mess with me . ";
		}

	}





	public function check_follow($user_id)
	{

		$db = new database();

		$from = Session::get('id');
		$check2 = $db->select("*", "follow", "followed_to='$user_id' && followed_by='$from'");

		if ($check2->rowCount() == 1) {
			echo "yes";
		} else {
			echo "";
		}
		
		/*
		if ($check2->rowCount() == 1) {
			return true;
		} else {
			return false;
		}*/

	}



	public static function image_data($name)
	{

		$db = new database();
		if (isset($_POST['data'])) {
			$check = $db->select("*", "post_media_src", "user_added='$name'  ORDER BY id DESC");
		} else {
			$check = $db->select("*", "post_media_src", "user_added='$name'  ORDER BY id DESC LIMIT 15");
		}
		$check->setFetchMode(PDO::FETCH_ASSOC);
		$check->execute();
		$data = $check->fetchAll();
		echo json_encode($data);

	}

	
//----------------------friends data for profile


	public function friends_of_pro($user_pro)
	{
		$friend_data = self::get_user_friends($user_pro);
		$new = implode(",", $friend_data);
		$new = explode(",", $new);
		echo json_encode($new);

	}

	public static function followers_of_pro($user)
	{
		$db = new database();
		$check = $db->select("followed_by", "follow", "followed_to='$user' ORDER BY id DESC LIMIT 15 ");
		$data = $check->fetchAll();
		echo json_encode($data);

	}

	public static function followings_of_pro($user)
	{
		$db = new database();
		$check = $db->select("followed_to", "follow", "followed_by='$user' ORDER BY id DESC LIMIT 15");
		$data = $check->fetchAll();
		echo json_encode($data);


	}
//-----------------------------------------Freinds data end---------------------------------------
// -----------------------------For check file------------------------------------------for home
	public static function get_file_existance()
	{
		$db = new database();
		$file = $_POST['file'];
		$max_width = $_POST['max_width'];
	 // echo $max_width;
		if (file_exists("./public/userdata/cover_pics/$file")) {
		 //if image in profile
			list($width, $height) = getimagesize("./public/userdata/cover_pics/$file");
			if ($width > $max_width) {
				$wdth = $max_width;
				$height1 = ($height / $width) * $wdth;
			} else {
				$wdth = $max_width;
				$height1 = ($height / $width) * $wdth;

			}
			$new_arr = "cover,$height1,$wdth";
			echo json_encode($new_arr);

		} elseif (file_exists("./public/userdata/data_pics/$file")) {
		 
		 //if image in data
			list($width, $height) = getimagesize("./public/userdata/data_pics/$file");
			if ($width > $max_width) {
				$wdth = $max_width;
				$height1 = ($height / $width) * $wdth;
			} else {
				$wdth = $max_width;
				$height1 = ($height / $width) * $wdth;

			}
			$new_arr = "data,$height1,$wdth";
			echo json_encode($new_arr);
 //$value_array=array('dic'=>"profile",'height'=>"$height1",'width'=>"$wdth");
         // echo json_encode($value_array);

		} elseif (file_exists("./public/userdata/profile_pics/$file")) {
		 
		 //if image in profile
			list($width, $height) = getimagesize("./public/userdata/profile_pics/$file");
			if ($width > $max_width) {
				$wdth = $max_width;
				$height1 = ($height / $width) * $wdth;
			} else {
				$wdth = $max_width;
				$height1 = ($height / $width) * $wdth;

			}
			$new_arr = "profile,$height1,$wdth";
			echo json_encode($new_arr);
 //$value_array=array('dic'=>"profile",'height'=>"$height1",'width'=>"$wdth");
         // echo json_encode($value_array);

		} else {
		 //If Image is broken
			echo "noImage";
		}

	}



// -----------------------------For check file------------------------------------------for profile
	public static function check_file()
	{

		$db = new database();
		$file = $_POST['file'];
		if (file_exists("./public/userdata/cover_pics/$file")) {
			echo "cover";
		} elseif (file_exists("./public/userdata/data_pics/$file")) {
			echo "data";

		} elseif (file_exists("./public/userdata/profile_pics/$file")) {
			echo "profile";
		} else {
		 //If Image is broken
			echo "noImage";
		}

	}

//----------------------------------------------Check File end-------------------------------------
//----------------------------------System works------------------------------------
	public static function fetch_like()
	{
		if (isset($_POST['uid'])) {
			$db = new database();
			$user = Session::get('id');
			$uid = md5($_POST['uid']);
			$check1 = $db->select("*", "likes", "uid='$uid' && user_id='$user'");
			$check1->execute();
			if ($check1->rowCount() == 1) {
				echo "yes";
			} else {
				echo "no";
			}
		} else {
			echo "You should not be here .";
		}

	}
	public static function fetch_like_all()
	{

		if (isset($_POST['uid'])) {
			$db = new database();
			$user = Session::get('id');
			$uid = md5($_POST['uid']);
			$check1 = $db->select("total_likes", "user_likes", "uid='$uid'");
			$check1->execute();
			if ($check1->rowCount() == 1) {
				$get = $check1->fetch();
				echo $get['total_likes'];
			} else {
				echo 0;
			}


		}
	}

	public static function like()
	{
		$db = new database();
		$user = Session::get('id');
		$uid = md5($_POST['uid']);

		$check = $db->select("*", "user_likes", "uid='$uid' ");
		$check->execute();
		if ($check->rowCount() >= 1) {
			$check1 = $db->select("*", "likes", "uid='$uid' && user_id='$user'");
			$check1->execute();
			if ($check1->rowCount() == 1) {
				$check1->setFetchMode(PDO::FETCH_ASSOC);
				$check1->execute();
				$get = $check1->fetch();
				//$total_l = $get['total_likes'];
			} else {
				$check2 = $db->select("*", "user_likes", "uid='$uid'");
				$check2->execute();
				$check2->setFetchMode(PDO::FETCH_ASSOC);
				$check2->execute();
				$get = $check2->fetch();
				$total_l = $get['total_likes'];
				$total_l++;

				$update = $db->update("user_likes", "total_likes='$total_l'", "uid='$uid'");

				$insert = $db->insert("likes (user_id,uid)", "('$user','$uid')");

				echo "Lifted up";
			}

		} else {
			$insert1 = $db->insert("user_likes (total_likes,uid)", "('1','$uid')");

			$insert2 = $db->insert("likes (user_id,uid)", "('$user','$uid')");

			echo "Lifted up";
		}

	}




	public static function like_remove()
	{
		$db = new database();
		$user = Session::get('id');
		$uid = md5($_POST['uid']);
		$check1 = $db->select("*", "likes", "uid='$uid' && user_id='$user'");
		$check1->execute();
		if ($check1->rowCount() == 1) {
			$check2 = $db->select("*", "user_likes", "uid='$uid'");
			$check2->execute();
			$check2->setFetchMode(PDO::FETCH_ASSOC);
			$check2->execute();
			$get = $check2->fetch();
			$total_l = $get['total_likes'];
			$total_l = $total_l - 1;
			$insert2 = $db->delete("likes", "user_id='$user' && uid='$uid'");

			$update = $db->update("user_likes", "total_likes='$total_l'", "uid='$uid'");

		}


	}
//dislikes--------------------system work---------------------------------///
	public static function fetch_dislike()
	{
		$db = new database();
		$user = Session::get('id');
		$uid = md5($_POST['uid']);
		$check1 = $db->select("*", "dislikes", "uid='$uid' && user_id='$user'");
		if ($check1->rowCount() == 1) {
			echo "yes";
		} else {
			echo "no";
		}

	}


	public static function fetch_dislike_all()
	{
		$db = new database();
		$user = Session::get('id');
		$uid = md5($_POST['uid']);
		$check1 = $db->select("total_dislikes", "user_dislikes", "uid='$uid'");
		$check1->execute();
		if ($check1->rowCount() == 1) {
			$get = $check1->fetch();
			echo $get['total_dislikes'];
		} else {
			echo 0;
		}

	}

	public static function dislike()
	{
		$db = new database();
		$user = Session::get('id');
		$uid = md5($_POST['uid']);

		$check = $db->select("*", "user_dislikes", "uid='$uid' ");
		if ($check->rowCount() >= 1) {
			$check1 = $db->select("*", "dislikes", "uid='$uid' && user_id='$user'");
			if ($check1->rowCount() == 1) {
				$check1->setFetchMode(PDO::FETCH_ASSOC);
				$check1->execute();
				$get = $check1->fetch();
				//$total_disl = $get['total_dislikes'];
			} else {
				$check2 = $db->select("*", "user_dislikes", "uid='$uid'");
				$check2->setFetchMode(PDO::FETCH_ASSOC);
				$check2->execute();
				$get = $check2->fetch();
				$total_disl = $get['total_dislikes'];
				$total_disl++;
				$update = $db->update("user_dislikes", "total_dislikes='$total_disl'", "uid='$uid'");
				$insert = $db->insert("dislikes (user_id,uid)", "('$user','$uid')");

				echo "Lifted Down";
			}

		} else {
			$insert1 = $db->insert("user_dislikes (total_dislikes,uid)", "('1','$uid')");

			$insert2 = $db->insert("dislikes (user_id,uid) ", "('$user','$uid')");

			echo "Lifted Down";
		}


	}




	public static function dislike_remove()
	{
		$db = new database();
		$user = Session::get('id');
		$uid = md5($_POST['uid']);
		$check1 = $db->select("*", "dislikes", "uid='$uid' && user_id='$user'");
		if ($check1->rowCount() == 1) {
			$check2 = $db->select("*", "user_dislikes", "uid='$uid'");
			$check2->setFetchMode(PDO::FETCH_ASSOC);
			$check2->execute();
			$get = $check2->fetch();
			$total_disl = $get['total_dislikes'];
			echo "previous->" . $total_disl;
			$total_disl = $total_disl - 1;
			echo "after->" . $total_disl;
			$insert2 = $db->delete("dislikes", "user_id='$user' && uid='$uid'");

			$update = $db->update("user_dislikes", "total_dislikes='$total_disl'", "uid='$uid'");

		}

	}
//del sys
	public static function delete_post()
	{
		$db = new database();
		if (isset($_POST['id'])) {
			$del_id = $_POST['id'];
			echo "
	<center><br>
	<label style='font-family:helvetica;font-size:15px; color:#777;word-wrap:break-word;'>Are you sure want to delete this ? Deleting a post cannot be reverse? </label><br><br><input type='button'  onclick='yes(" . $del_id . "," . '""' . ")' id='yeah' style='margin-left:2px;'value='Yes'/> <input type='button' onclick='no()' id='nope'style='margin-left:2px;'value='No'/	></center>";
		} elseif (isset($_POST['del_id'])) {
			$del_id_del = $_POST['del_id'];
	//	mysqli_query($connection,"DELETE FROM posts WHERE id='$del_id_del'");
			$check = $db->delete("posts", "id='$del_id_del'");

			echo "<br><center><label style='font-family:helvetica;font-size:15px; color:#777;'>You post deleted</label></center>";
		} else {
			echo "Get lost";
		}

	}

	//share sys
	public static function share_post()
	{
		$db = new database();
		if (isset($_POST['id'])) {
			$share_id = $_POST['id'];
			$share = "Share";
			echo "
	<center><br>
	<label style='font-family:helvetica;font-size:15px; color:#777;'>Click on yes to share this on your post stream. </label><br><br><input type='button'onclick='yes(" . $share_id . "," . '"' . $share . '"' . ")' id='yeah' style='margin-left:2px;'value='Yes'/> <input type='button' onclick='no()' id='nope'style='margin-left:2px;'value='No'/	></center>";
		} elseif (isset($_POST['del_id'])) {

			$share_id = $_POST['del_id'];

			$user = Session::get('id');
			$last_id = "";
			$date_added = date("Y-m-d H:i:s");// Date on added
			$added_by = $user;   // added By
			$user_posted_to = $user;  // added to
			$time = time();

			if (isset($_POST['post'])) {
				$post = $_POST['post'];
			} else {
				$post = "";
			}

			$insert1 = $db->insert("posts (body,date_added,added_by,user_posted_to,if_shared)", "('$post','$date_added','$added_by','$user_posted_to','$share_id')");
			$last_id = $db->lastInsertId();

			if ($insert1) {
				echo "Post Successfully shared on your stream.";
			} else {
				echo "Something went wrong";
			}


		} else {
			echo "Get lost";
		}

	}





	public static function get_active_user()
	{
		self::update_time();
		if (isset($_POST['data'])) {
			$db = new database();
			$user = $_POST['data'];
			$time = time();

			$select = $db->select("followers_count", "myusers", "username='$user'");
			if ($select->rowCount() >= 1) {
				$get = $select->fetch();
				$lastSeen = $get['followers_count'];
		//	echo  exit();
		//$time=time();
		 //echo date('Y-m-d h:i:s', $lastSeen

				if (time() - $lastSeen >= 8) {
					echo "offline";
				} else {
					echo "online";
				}
			}
		}



	}



	private static function update_time()
	{

		$db = new database();
		$user = Session::get('user');
		$time = time();
		$query = $db->update("myusers", "followers_count='$time'", "username='$user'");

	}



}// Class Ended


?>