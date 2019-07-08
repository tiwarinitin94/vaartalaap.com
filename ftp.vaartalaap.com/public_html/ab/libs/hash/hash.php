<?php

class hash{
	/*
	*@param string $algo The algorithm(md5,sha1,whirlpool,etc)
	*@param string $data The data to encode
	*@param string $data This should be the same throughout the system
	*return string The hashed/salted data
	*/
	
	public static function create($algo,$data,$salt){
		
		$context=hash_init($algo,HASH_HMAC,HASH_KEY);
		hash_update($context,$data);
		
		return hash_final($context);
		
	}
}


?>