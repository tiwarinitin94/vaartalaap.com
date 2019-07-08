<?php 
  class Index_model extends Models{
	  public function __construct(){
		   parent::__construct();
		   }
	  
	
     
	  
	  public function sign_up(){
 
		  $fn=strip_tags($_POST['fname']);
          $ln=strip_tags($_POST['lname']);
          $un=strip_tags($_POST['username']);
          $em=strip_tags($_POST['email']);
           $pswd=strip_tags($_POST['password']);
            $d=date("Y-m-d");
          $gender = strip_tags($_POST['gender']);
		  $country=strip_tags($_POST['country']);
		  $terms_fake=hash::create('md5',$_POST['terms_'],HASH_KEY_PSWD);
		   $write='Write Something about yourself';
		   $no='no';
		   $pswd=hash::create('md5',$pswd,HASH_KEY_PSWD);
		  $off=hash::create('md5',"off",HASH_KEY_PSWD);
		   if($terms_fake== $off){
		   $check=$this->db->insert("myusers (username,first_name,last_name,email,password,sign_up_date,bio,gender,country,closed,deactivate)","('$un',
								 '$fn',
								 '$ln',
								 '$em',
								'$pswd',
								'$d',
    							 '$write',
								'$gender',
								'$country',
								'$no',
								'$no')");	 
							if(!$check){
									echo "Problem";
								}
	  }else{
		 
	  }
	  }
	  
	 public function sign_check(){
		 $fn=strip_tags(@$_POST['user']);
          $ln=strip_tags(@$_POST['email']);
		 $em=strip_tags(@$_POST['email']);
            $pswd=strip_tags(@$_POST['pswd']);
          
		 
		  $sql=$this->db->select('*','myusers',"username='$fn'");
		     $num=$sql->rowCount();
			  $sql1=$this->db->select('*','myusers',"email='$ln'");
		 	  $num1=$sql1->rowCount();
			  $check_page=array('gallery_area','profile','message','settings','news','requests');
		  if($num==1 || in_array($fn,$check_page)){
			  echo "Username already taken";
			  return false;
			  }elseif($num1>=1){
				  echo "Email already in use.";
				  return false;
			  }
			  return true;
		 
	 }
  }
?>


