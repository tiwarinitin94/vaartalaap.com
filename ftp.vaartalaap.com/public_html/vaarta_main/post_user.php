<?php
class post_user extends Controller
{

	function __construct()
	{

		parent::__construct();

		$this->view->js = array('post_user/default.js');

	}

	function Index()
	{
		$this->view->render('post_user/index');

	}




}
?>