<?php
class about extends Controller{
      
		  function __construct(){
		 
		    parent::__construct();
			
		  $this->view->js=array('about/default.js');
		
}

function Index(){
		 $this->view->render('about/index');
		
}

function submit_bug(){
	
	$this->model->submit_bug();
}



}
?>