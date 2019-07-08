<?php

class message extends Controller{
	  function __construct(){
	 parent::__construct();
	 Session::init();
				$logged=Session::get('loggedin');
		 
		   if($logged==false){
			   Session::destroy();
			  header('location:'.URL);
              exit();			  
		   }else{
			     $this->user->data();			
		   }
		    $this->view->js=array('message/default.js');
}
function Index(){
	 	 $this->view->render('message/index');
}

public function get_u_data($user){
	$this->model->get_u_data($user);
}
public function get_pattern(){
	$this->model->get_pattern();
}

public function create_user_data($x){
	$this->model->create_user_data($x);
}
public function create_the_div($cr_id){
	$this->model->create_the_div($cr_id);
}

public function get_the_anonymous_activity_that_is_going_out_there(){
	$this->model->get_messages();
}

public function send_the_problem_out($c_cid){
	$this->model->send_message($c_cid);
}
}




?>