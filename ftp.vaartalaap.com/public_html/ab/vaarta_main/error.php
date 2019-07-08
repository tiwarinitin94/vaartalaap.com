<?php
class error_vrt Extends Controller{
function __construct(){
	parent::__construct();
	
}

function __destruct(){

}
function Index(){
		 $this->view->render('error/index');
}
}
?>