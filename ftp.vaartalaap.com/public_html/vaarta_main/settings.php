<?php

class settings extends Controller{
	  function __construct(){
	 parent::__construct();
		 
		  $this->view->js=array('settings/default.js');
}
function Index(){
	 	 $this->view->render('settings/index');
}
 public function other($arg= false){
	    $this->view->render('settings/index');
	 }
}




?>