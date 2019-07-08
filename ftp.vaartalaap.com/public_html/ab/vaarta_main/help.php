<?php
class help extends Controller{
	  function __construct(){
	 parent::__construct();
		 
}
function Index(){
	 	 $this->view->render('help/index');
}
 public function other($arg= false){
	    $this->view->render('help/index');
	 }
}
?>