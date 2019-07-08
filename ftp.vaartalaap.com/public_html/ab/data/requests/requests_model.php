<?php
       class requests_model extends Models{
       
           public function __construct(){
		   parent::__construct();
                 
		   }
       
       

    public function get_the_request(){
		$username=$_POST['user'];
		  $select= $this->db->select("id,user_from,user_to","friend_requests","user_to='$username'");
		  $count= $select->rowCount();
		  if($count){
			  $data=$select->fetchAll();
			  echo json_encode($data);
		  }else{
			  echo json_encode(array(array("value"=>"No")));
		  }
	}
	
	public function accept_it(){
		$user=Session::get('user');
		if(isset($_POST['user'])){
		$user_from=$_POST['user'];
		  $select= $this->db->select("friend_array","myusers","username='$user'");
		  $select2= $this->db->select("friend_array","myusers","username='$user_from'");
		  $data=$select->fetch(); $data2=$select2->fetch();
		  			 $data=explode(",",$data['friend_array']);
					 $data2=explode(",",$data2['friend_array']);
		  if(!in_array($user_from,$data) && !in_array($user,$data2)){
			   self::set_request($user,$user_from);
		self::set_request($user_from,$user);
		self::decline_it($user_from);
		
		  }else{
			  echo "Already in List";
			  self::decline_it($user_from);
		  }
		}else{
			echo"If you are mistaken then this is not for you else, get out from here.";
		} 
	}
	
	public function decline_it($user_from=false){
		$user=Session::get('user');
		if($user_from){
			echo "No";
			$delete=$this->db->delete("friend_requests","user_to='$user' && user_from='$user_from'");
		}else if(isset($_POST['user'])){
		$user_from=$_POST['user'];	
		//echo "$user -> $user_from";
		     $delete=$this->db->delete("friend_requests","user_to='$user' && user_from='$user_from'");
			 
		}
		
		}
	private function set_request($for_user,$other_user){
		  $select= $this->db->select("friend_array","myusers","username='$for_user'"); 
		  if($select->rowCount()==1){
			  $data=$select->fetch();
		 $data2=$data['friend_array'];
	 $data2=$data2.",$other_user";
		$update=$this->db->update("myusers","friend_array='$data2'","username='$for_user'");
		
		   }
	}
	   }
?>