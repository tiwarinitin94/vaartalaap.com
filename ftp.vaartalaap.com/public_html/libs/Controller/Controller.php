<?php
class Controller{

function __construct(){
	$this->view=new view();
	$this->user=new user();
	
}
public function load_model($name,$data_array=false){
   
  // echo $name;
	$path='data/'.$name.'/'.$name.'_model.php';
		if(file_exists($path)){
			 require 'data/'.$name.'/'.$name.'_model.php';
			$modelName=$name.'_model';
			$this->model=new $modelName();
								
		}else{
			echo "No model";
		}
	}


}
?>