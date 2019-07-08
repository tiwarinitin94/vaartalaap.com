<?php
class login extends Controller{
	  function __construct(){
		    parent::__construct();
				Session::init();
				$logged=Session::get('loggedin');
		   if($logged!=false){
			   header('location:'.URL);
              exit();			  
		   }else{
                $this->view->js=array('login/default.js');
		   }
		  
	}
function Index(){
	   		 $this->view->render('login/index');
		 
}
function run(){
	$this->model->run();
}

}
?>