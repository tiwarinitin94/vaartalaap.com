<?php
      class message_model extends Models{
	  public function __construct(){
		   parent::__construct();
          
		  
		  
		   }

 public function create_user_data($x){
	 	
	 if(isset($_POST['cr_id'])){
	 $str="IDIOTS_CHECK_THIS_OUT_FOR_Create";
	 $x=trim($x,$str);
	 $cr_id=$_POST['cr_id'];
$check= $this->db->select("R.cr_id,R.user_two_read,R.c_id_fk,R.user_id_fk","conversation_reply R","R.cr_id='$cr_id' ORDER BY R.cr_id DESC LIMIT 1") or die(mysql_error());
 $count=$check->rowCount();
   if($count>=1){
	 $check->setFetchMode(PDO::FETCH_ASSOC);
	  $data= $check->fetch();
	  $cid=$data['c_id_fk'];
	  $user_two_read=$data['user_two_read'];
	  $user_id_fk=$data['user_id_fk'];
	  $new_arr=array('cid' =>$cid ,'oid' => $x ,'user_read'=>$user_two_read,'user_id_fk'=>$user_id_fk);

	// print_r($new_arr);
	echo json_encode($new_arr);
  }
	 }else{
		 echo "You should not be here";
	 }
	
	}

	public function create_the_div($x){
		 $str="IDIOTS_CHECK_THIS_OUT_FOR_Create";
	 $x=trim($x,$str);
	 $c_id=$_POST['c_id'];
	 $user_id_fk=$_POST['user_id_fk'];
	 $user_read=$_POST['user_read'];
    $user_id=Session::get('id');
$check= $this->db->select("c_id,user_one,user_two","conversation","c_id='$c_id'  ");
 $count=$check->rowCount();
   if($count==1){
	 $check->setFetchMode(PDO::FETCH_ASSOC);
	  $data= $check->fetch();
	  if($data['user_one']==$user_id){
		 // echo $data['user_two'];
		  self::fetch_user($data['user_two'],$x,$user_id_fk,$user_read,$c_id);
	  }else{
		// echo $data['user_one'];
		  self::fetch_user($data['user_one'],$x,$user_id_fk,$user_read,$c_id);
		  
	  }
 }else{
	  echo "idiot";
  }
	
	}
public function fetch_user($user_id,$x,$user_id_fk,$user_read,$c_id){
     $check= $this->db->select("username","myusers","id='$user_id'");
	$check->setFetchMode(PDO::FETCH_ASSOC);
	  $data= $check->fetch();
	//$new_val= $data['username'].",".$user_id;
	 $new_arr=array('user_name' =>$data['username'],'u_id' =>$user_id,'x'=>$x,'user_read'=>$user_read,'user_id_fk'=>$user_id_fk,'c_id'=>$c_id);
	echo json_encode($new_arr);
	
}	 
	 
	 
	 
  public function get_pattern(){
	
	  if(isset($_POST['c_id'])){
	 $c_id=$_POST['c_id'];
   $check= $this->db->select("R.cr_id,R.c_id_fk","conversation_reply R","R.c_id_fk ='$c_id' ORDER BY R.cr_id DESC LIMIT 1") or die(mysql_error());
 $count=$check->rowCount();
  if($count>=1){
	 $check->setFetchMode(PDO::FETCH_ASSOC);
	   
	    $data= $check->fetchAll();
		//print_r($data);
	
	echo json_encode($data);
  }
	  }else{
		  echo "You should not be here.";
	  }
	  
	  
 }
		   
  public function get_u_data($id_U){ 
 
    $user_one=Session::get('id');
   $check= $this->db->select("u.id,c.c_id","conversation c, myusers u","CASE 
 WHEN c.user_one = '$user_one'
 THEN c.user_two = u.id
 WHEN c.user_two = '$user_one'
 THEN c.user_one = u.id
 END 
 AND (
 c.user_one = '$user_one'
 OR c.user_two = '$user_one'
 )
 ORDER BY c.c_id DESC LIMIT 20") or die(mysql_error());
  
  $count=$check->rowCount();
  if($count>=1){
	   $check->setFetchMode(PDO::FETCH_ASSOC);
	    $check->execute();
	    $data= $check->fetchAll();

	echo json_encode($data);
  }else{
	  echo json_encode(array(array('response'=>"getout")));
  }

  	 }

	 
	 
	 public function get_messages(){
		
		$check="";
		if(isset($_POST['the_new_crid']) && isset($_POST['cid'])){
			 $the_new_crid=$_POST['the_new_crid'];$cid=$_POST['cid'];
			 //	echo $the_new_crid;
			 $check= $this->db->select("1","SELECT U.username,R.reply,R.time,R.user_two_read,R.pics,R.cr_id FROM myusers U, conversation_reply R WHERE R.user_id_fk=U.id and R.c_id_fk='$cid' and R.cr_id<'$the_new_crid' ORDER BY cr_id DESC LIMIT 9","");
	   
		}else if(isset($_POST['cid'])){
			
			$cid=$_POST['cid'];
			$check= $this->db->select("1","SELECT U.username,R.reply,R.time,R.user_two_read,R.pics,R.cr_id FROM myusers U, conversation_reply R WHERE R.user_id_fk=U.id and R.c_id_fk='$cid' ORDER BY cr_id DESC LIMIT 9","");
	   
		}else{
			echo "Just go to hell<br>";
		}
		  if(!$check){echo "idiot";}else{
     
		 $count=$check->rowCount();
  if($count>=1){
	   $check->setFetchMode(PDO::FETCH_ASSOC);
	    $check->execute();
	    $data= $check->fetchAll();

	echo json_encode($data);
  }else{
	  echo json_encode(array('0'=>array("Nothing"=>"Nothing")));
  }
		  }
		  
		  
	 }
	 

	 
	 
	 public function send_message($c_cid){
		 
		 $user_one=Session::get('id');
		 
		 $x="thissdlfhdgjhasbgadbgbdfdahgljadfhadjfhadjfhdfhdsajfhjdfhdljfhdlasfhldfjadjfafjadfj";
		 $c_cid=trim($c_cid,$x);
		//print_r($_FILES);exit();
		 if(isset($_POST['msginput'])){
			 $message=$_POST['msginput'];
		 }else{$message="";}
 if ((isset($_FILES['file'])) && (($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")||($_FILES["file"]["type"] == "image/gif")) && ($_FILES["file"]["size"] < 2000000)) {
if ($_FILES["file"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
}
else
{ 
     $chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			  $rand_dir_name = substr(str_shuffle($chars), 0, 15);
			  if(!mkdir('./public/userdata/data_pics/'.$rand_dir_name)){
			     echo "Cannot make directory";
			  }else if(file_exists('./public/userdata/data_pics/$rand_dir_name/'.@$_FILES["file"]["name"])){
                 echo @$_FILES["file"]["name"]." Already exists";
   }
else
{
$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
$temp = explode(".", $_FILES["file"]["name"]);
 $newfilename = round(microtime(true)) . '.' . end($temp);
 move_uploaded_file(@$_FILES["file"]["tmp_name"],"./public/userdata/data_pics/$rand_dir_name/".$newfilename);
     $post_pic = @$newfilename;
    $time=date("Y-m-d H:i:s");
    $ip=$_SERVER['REMOTE_ADDR'];
    // $q= mysqli_query($connection,"INSERT INTO conversation_reply (reply,pics,user_id_fk,user_two_read,ip,time,c_id_fk) VALUES ('$post','$rand_dir_name/$post_pic','$user_one','no','$ip','$time','$cid')") or die(mysqli_error());
    if($_FILES["file"]["size"]>0){
	$insert1=$this->db->insert("conversation_reply (reply,pics,user_id_fk,user_two_read,ip,time,c_id_fk)","('$message','$rand_dir_name/$post_pic','$user_one','no','$ip','$time','$c_cid')") or die(mysqli_error());
	Echo "Your Message sent";
	}else{
		echo "Please submit something";
	}
}
}
}else{
	
	     $post_pic = "Nothing";
    $time=date("Y-m-d H:i:s");
    $ip=$_SERVER['REMOTE_ADDR'];
    // $q= mysqli_query($connection,"INSERT INTO conversation_reply (reply,pics,user_id_fk,user_two_read,ip,time,c_id_fk) VALUES ('$post','$rand_dir_name/$post_pic','$user_one','no','$ip','$time','$cid')") or die(mysqli_error());
   if($message!=""){
	$insert1=$this->db->insert("conversation_reply (reply,pics,user_id_fk,user_two_read,ip,time,c_id_fk)","('$message','$post_pic','$user_one','no','$ip','$time','$c_cid')") or die(mysqli_error());
	Echo "Your Message sent";
   }else{
		echo "Please submit something";
	}
}//The image check end

}// The function End
	
public static function save_chat_session(){
	 
	if(isset($_POST['c_id'])){
	$cid=$_POST['c_id'];
	$new_arr=array();
	if(sizeof(Session::get('chat_list'))==0){
		$new_arr[0]=$cid;
	}else {
		
		$new_arr=Session::get('chat_list');
		if(!in_array($cid,$new_arr)){
		array_push($new_arr,$cid);
		}
		
	}
	
	
	Session::set('chat_list',$new_arr);
	
	}else{
		echo "You should not be here";
	}
	}

public static function update_chat_session(){

	if(sizeof(Session::get('chat_list'))>0){
	echo json_encode(Session::get('chat_list'));
	}else{
		echo "no chat found";
	}
	
}
	
	
	  }
?>