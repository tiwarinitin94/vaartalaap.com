<?php

class settings extends Controller{
	  function __construct(){
	 parent::__construct();
		 
		  $this->view->js=array('settings/default.js');
}
function Index(){
		$token_value=csrf::get_token_csrf();
	$_POST['csrf_val']=$token_value;
	 	 $this->view->render('settings/index');
}
 public function other($arg= false){
	 	$token_value=csrf::get_token_csrf();
	$_POST['csrf_val']=$token_value;
	    $this->view->render('settings/index');
	 }
	 
function checkPassword(){
    	$token_value=csrf::get_token_csrf();
	$_POST['csrf_val']=$token_value;
	$this->model->check_follow($_POST['pswd']);
}

}




?>