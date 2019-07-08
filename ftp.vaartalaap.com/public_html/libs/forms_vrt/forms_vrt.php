<?php
class forms_vrt
{

	private $_postData = array();

	function __construct()
	{


	}
	public function post($field)
	{
		$this->_postData[$field] = $_POST[$field];

	}


	public function val()
	{

	}



}


?>