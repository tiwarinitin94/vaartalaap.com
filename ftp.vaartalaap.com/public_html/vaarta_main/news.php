<?php

class news extends Controller{
	  function __construct(){
	 parent::__construct();
		 
}
function Index(){
	 	 $this->view->render('news/index');
}
 public function other($arg= false){
	    $this->view->render('news/index');
	 }
}




?>