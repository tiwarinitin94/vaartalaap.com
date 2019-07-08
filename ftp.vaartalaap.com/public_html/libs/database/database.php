<?php 

class database extends PDO{
	public function __construct(){
		parent::__construct(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
		
	}
	
	
	public function select($value, $from ,$where){
		$value=($value!="") ? $value : null;
		$from=($from!="") ? $from : null;
		$where=($where!="") ? $where : null;
		
		//echo "SELECT $value FROM $from WHERE $where";die;
		
		//return $value;
		if($where!=""){
		
		$check=$this->prepare("SELECT $value FROM $from WHERE $where");
		
		}
		else if($value=='1' && $where==""){
						//echo $from;
			$check=$this->prepare($from);
				//die;
		} 		
		else{
			
			$check=$this->prepare("SELECT $value FROM $from");
			
		}
		  $check->execute();
		 
		  return $check;
	}
	

	public function insert($in,$value){
		$in=($in!="") ? $in : null;
		$value=($value!="") ? $value : null;
		
		 $check=$this->prepare("INSERT INTO $in VALUES $value");
		  $check->execute();
		return $check;
	}
	
	public function update($base,$set,$where){
		$base=($base!="") ? $base : null;
		$set=($set!="") ? $set : null;
		$where=($where!="") ? $where : null;
		if($where!=""){
		 $check=$this->prepare("UPDATE $base SET $set WHERE $where");
		}else{
			$check=$this->prepare("UPDATE $base SET $set");
		}
		
		$check->execute();
		  return $check;
		
	}
	
		
	public function delete($base,$where){
		$base=($base!="") ? $base : null;
		$where=($where!="") ? $where : null;
		if($where!=""){
		 $check=$this->prepare("DELETE FROM $base WHERE $where");
		 
		}else{
			echo "Problem";
		}
		
		$check->execute();
		  return $check;
	}
	
}


?>