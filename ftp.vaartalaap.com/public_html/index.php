<?php
//configure
require "config/url.php";
require "config/database.php";
require "config/constants.php";
 
//library
require LIBS."database/Session.php";

function __autoload($class){
   
	if(file_exists(LIBS."".$class."/".$class.".php")){
	require LIBS."".$class."/".$class.".php";
	}else{
		echo "Sorry There is something wrong";
	}
}



$app = new Bootstrap();
?>