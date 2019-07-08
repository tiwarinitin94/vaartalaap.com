<?php

class requests extends Controller{
	  function __construct(){
	 parent::__construct();
	 
	  Session::init();
				$logged=Session::get('loggedin');
		   if($logged==false){
			   Session::destroy();
			  header('location:'.URL);
              exit();			  
		   }else{
			     //$this->user->data();			
		   }
		 
		   $this->view->js=array('requests/default.js');
		 
}
function Index(){
	 	 $this->view->render('requests/index');
}

function get_the_request(){
	$this->model->get_the_request();
}
function accept_it(){
	$this->model->accept_it();
}
function decline_it(){
	$this->model->decline_it();
}

}




?>