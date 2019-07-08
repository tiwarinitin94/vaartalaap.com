<?php
  if(class_exists ( "Controller" )){
	
  class Index extends Controller{
	  function __construct(){
		  parent::__construct();
		  $this->view->js=array('index/default.js');
	  }
function Index(){
	 $this->view->main="index";
		 $this->view->render('index/index');
}
function run(){
	$this->model->run();
}
function sign_check(){
	$this->model->sign_check();
}

function sign_up(){
	
	$this->model->sign_up();
	
	}
	 function xhrGetData(){
		  $un=strip_tags(@$_POST['username']);
		   $em=strip_tags(@$_POST['email']);
           echo $un;  
		  
		  
	}
  }

  }else{
	  echo "You should not be here. ";
  }

?>