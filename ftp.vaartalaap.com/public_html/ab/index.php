	<?php
//configure
require "config/url.php";
require "config/database.php";
require "config/constants.php";
 
//library
require LIBS."database/Session.php";

spl_autoload_register(function($class) {
	
	if(file_exists(LIBS."".$class."/".$class.".php")){
		//echo LIBS."".$class."/".$class.".php<br>";
	require LIBS."".$class."/".$class.".php";

	}else{
		echo "Sorry There is something wrong";
	}
});



$app = new Bootstrap();
?>