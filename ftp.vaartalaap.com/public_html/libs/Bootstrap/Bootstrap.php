<?php

class Bootstrap
{
	static $data;
	
	//contructor of bootstrap
	function __construct()
	{
	
	
	
	//database
		$this->db = new database();
			 	
				
				
	//-------------------------------------------------For url of site


		$url = "";
		if (isset($_GET['url'])) {
			$url = htmlspecialchars($_GET['url']);
		}
	
	#echo $url." khkk";

		Session::init();
		$logged = Session::get('loggedin');
		$url = rtrim($url, '/');



		if ($logged) {

			

			$user_logged = Session::get('user');


			$check_user = $this->db->select("id,username,first_name,last_name,bio,profile_pic,country", "myusers", "username='$user_logged'");
			$count_user = $check_user->rowCount();

			if ($count_user > 0) {
				$data_u = $check_user->fetch();
			

			//print_r($check->fetch());
			}

			$of = new otherfunctions();
			$profilepicofuser = "";
			if ($data_u['profile_pic'] == "") {

				$profilepicofuser = URL . "public/images/default-pic.png";
			} else {
				$profilepicofuser = URL . "public/userdata/profile_pics/" . $data_u['profile_pic'];
			}

			//echo $profilepicofuser;


			$of->setuserprofilepic($profilepicofuser);

			$of->setuserfullname($data_u['first_name'] . " " . $data_u['last_name']);


		} else {
			/*echo "not Logged in ";
			exit();*/
		}





		$url = filter_var($url, FILTER_SANITIZE_URL);
		$url2 = explode('/', $url);//exploding '/'

		$file = 'vaarta_main/' . $url2[0] . '.php';//get the file name
   //If $url2[0] is a file the file var will hold it
   
   

   
    
	//$url2[0] is parameter one to our web url
   
   
    //if url is empty

		if (empty($url2[0]) || strtolower($url2[0]) == 'home' && empty($url2[1])) { 
     
	  //If url has nothing 

			if ($logged == false) {
		   //if not logged in
				require_once 'vaarta_main/home.php';
				$controller = new home();
				$controller->Index();
				$controller->load_model('home');
				return false;
			} else {
		   //if logged in
				require_once 'vaarta_main/gallery_area.php';
				$controller = new gallery_area();
				$controller->index();
			//	$token_value = csrf::get_token_csrf();

				$controller->load_model('gallery_area');
				return false;
			}

		}




//--------------------------------------------------------check if profile exist----------------------------//
	    //echo $url2[0];
		$check = $this->db->select("id,username,first_name,last_name,bio,profile_pic,country", "myusers", "username='$url2[0]' OR id='$url2[0]'");
		$count = $check->rowCount();

		if ($count > 0) {
			self::$data = $check->fetch();
			

			//print_r($check->fetch());
		} 
	
	//if $url2[0] is a username then count=1
	
	
//if the url name exist
		if (file_exists($file)) {
		// echo $file;
			require "$file";
		} elseif ($count == 1) {
			if (sizeof($url2) > 1) {
				$this->error();
				return false;
			}

			require_once "vaarta_main/profile.php";
			/*if (!$data) {
				$this->error();
			}*/
			$controller = new profile(self::$data);
		//	$token_value = csrf::get_token_csrf();
			$_POST['csrf_val'] = $token_value;
			$controller->Index(self::$data);
			$controller->load_model("profile");
			return false;
		} else {
		//error showing
			$this->error();
			return false;
		}

		if (class_exists($url2[0])) {  //if any class exist that shows if any controller exist

			$controller = new $url2[0];  //Create object of the class
			$controller->load_model($url2[0]);//load model of url 
			if (isset($url2[2])) { //If there is a function call
				if (method_exists($controller, $url2[1])) { //Call the function with parameter
					$controller->{$url2[1]}($url2[2]);
				} else {
					$this->error();
					return false;
				}
			} elseif ($url2[0] == 'profile' && sizeof($url2) <= 1) {
				$this->error();
				return false;
			} elseif (isset($url2[1])) {
				if (method_exists($controller, $url2[1])) {
					$controller->{$url2[1]}();
				} else {
					$this->error();
					return false;
				}
			} else {
			//	$token_value = csrf::get_token_csrf();
				$_POST['csrf_val'] = $token_value;
				$controller->index();
			}
		}
	}


//For Error page not found
	public static function error()
	{
		require_once "vaarta_main/error.php";
		$controller = new error_vrt();
		$controller->Index();
		return false;
	}
}

?>