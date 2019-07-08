<?php 
  class login_model extends Models{
	  public function __construct(){
		   parent::__construct();
    
		   }
	  
	      public function run(){

		  $un =$_POST['user_login'];
		  
		  $pswd =hash::create('md5',$_POST['password_login'],HASH_KEY_PSWD);
		  
		  $pswd_md5 =md5($_POST['password_login']);
		  		//echo $un ; die;
		  $check=$this->db->select('*','myusers',"username='$un' OR email='$un'");	
           
		       if(!$check){
				  echo "problem";
				  die;
			  }
		  $count=$check->rowCount();
		  if($count==1){
			  
			   $check_pswd=$this->db->select('id,username,password,email,profile_pic','myusers'," password='$pswd' && username='$un' OR email='$un' && password='$pswd'");
			   $check_pswd2=$this->db->select('id,username,password,email,profile_pic','myusers'," password='$pswd_md5' && username='$un' OR email='$un' && password='$pswd' ");
			   $count=$check_pswd->rowCount();
			   $count2=$check_pswd2->rowCount();
			   if($count==1){
			$check_pswd->setFetchMode(PDO::FETCH_ASSOC);
			 $check_pswd->execute();
			 $get=$check_pswd->fetch();
			 
			 $id=$get['id'];
			 $username=$get['username'];
			 Session::init();
			 Session::set('user',$username);
			 Session::set('id',$id);
			 Session::set('loggedin',true);
			 header('location:'.URL.'gallery_area/' );
			   }elseif($count2==1){
				 
				 $pswd_new=$this->db->update("myusers","password='$pswd'","username='$un'");
				 if($pswd_new){
				 $check_pswd->setFetchMode(PDO::FETCH_ASSOC);
			     $check_pswd->execute();
			     $get=$check_pswd->fetch();
			     $id=$get['id'];
			     $username=$get['username'];
			     Session::init();
			     Session::set('user',$username);
			     Session::set('id',$id);
			     Session::set('loggedin',true);
			     header('location:'.URL.'gallery_area/' );
				 }else{
					    echo "login_pswd";
				   return false;
				 }
				   
			   }else{
				   echo "login_pswd";
				   return false;
			   }
		  }else{		  
			 echo "login_failed";
			return false;
			 
		  }
	  }		
	  
  }  
	  ?>