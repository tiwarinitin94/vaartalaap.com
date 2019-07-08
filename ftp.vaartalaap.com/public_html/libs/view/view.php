<?php
class view{
function __construct(){
	 
	}
public function render($name){
	
     require 'views/header.php'; 
	 if($name=="gallery_area/index" || $name=="profile/index" ||$name=="message/index" ||$name=="settings/index" ||$name=="requests/index"||$name=="news/index"  ){
		require 'views/left_menu.php'; 
		}
	 require 'views/'.$name.'.php';
	 require 'views/footer.php';
}


}
?>