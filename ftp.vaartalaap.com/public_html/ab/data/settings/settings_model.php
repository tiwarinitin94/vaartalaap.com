<?php
      class settings_model extends Models{
	  public function __construct(){
		   parent::__construct();
                 
		   }
	public function profile_user(){
		
	}
	
	
	public function check_follow($pswd){
		if(isset( $_POST['csrf_val'])){
		$un=Session::get('user');
		$pswd =hash::create('md5',$pswd,HASH_KEY_PSWD);
		$pswd_new=$this->db->select("password,username","myusers","username='$un' && password='$pswd'");
		 $count=$pswd_new->rowCount();
		 if($count==1){
			 echo "success";
		 }else{
			 echo "failed";
		 }
		 }else{
		echo "You should not be here";
	}
	}
	
	


	 
	  }
?>