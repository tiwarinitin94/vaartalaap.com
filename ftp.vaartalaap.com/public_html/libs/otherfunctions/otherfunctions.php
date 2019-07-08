<?php
class otherfunctions
{
	public static $ip_country;
	public static $profile_pic;
	public static $full_name;

	public function __construct()
	{

	}


	public function setuserprofilepic($profile)
	{

		self::$profile_pic = $profile;

	}

	public function getuserprofilepic()
	{
		return self::$profile_pic;
	}


	public function setuserfullname($name)
	{

		self::$full_name = $name;

	}

	public function getuserfullname()
	{
		return self::$full_name;
	}




	public function set_ip()
	{

        //self::$ip_country = self::ip_info(self::getIpAdd(), "Country", $deep_detect = true);

       // echo "SET " . self::getIpAdd();

	}

	static public function get_ip()
	{

		return self::$ip_country;
	}





	function getIpAdd()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
		{
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
		{
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;

         // Get real visitor IP behind CloudFlare network
        /*if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }

        return $ip;*/
	}



    /*  USE OF IP INFO Function


     echo ip_info("173.252.110.27", "Country"); // United States
     echo ip_info("173.252.110.27", "Country Code"); // US
     echo ip_info("173.252.110.27", "State"); // California
     echo ip_info("173.252.110.27", "City"); // Menlo Park
     echo ip_info("173.252.110.27", "Address"); // Menlo Park, California, United States
     print_r(ip_info("173.252.110.27", "Location")); // Array ( [city] => Menlo Park [state] => California [country] => United States [country_code] => US [continent] => North America [continent_code] => NA )



	 */


	function ip_info($ip = null, $purpose = "location", $deep_detect = true)
	{
		$output = null;
		if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
			$ip = $_SERVER["REMOTE_ADDR"];
			if ($deep_detect) {
				if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
					$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
					$ip = $_SERVER['HTTP_CLIENT_IP'];
			}
		}
		$purpose = str_replace(array("name", "\n", "\t", " ", "-", "_"), null, strtolower(trim($purpose)));
		$support = array("country", "countrycode", "state", "region", "city", "location", "address");
		$continents = array(
			"AF" => "Africa",
			"AN" => "Antarctica",
			"AS" => "Asia",
			"EU" => "Europe",
			"OC" => "Australia (Oceania)",
			"NA" => "North America",
			"SA" => "South America"
		);
		if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
			$ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
			if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
				switch ($purpose) {
					case "location":
						$output = array(
							"city" => @$ipdat->geoplugin_city,
							"state" => @$ipdat->geoplugin_regionName,
							"country" => @$ipdat->geoplugin_countryName,
							"country_code" => @$ipdat->geoplugin_countryCode,
							"continent" => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
							"continent_code" => @$ipdat->geoplugin_continentCode
						);
						break;
					case "address":
						$address = array($ipdat->geoplugin_countryName);
						if (@strlen($ipdat->geoplugin_regionName) >= 1)
							$address[] = $ipdat->geoplugin_regionName;
						if (@strlen($ipdat->geoplugin_city) >= 1)
							$address[] = $ipdat->geoplugin_city;
						$output = implode(", ", array_reverse($address));
						break;
					case "city":
						$output = @$ipdat->geoplugin_city;
						break;
					case "state":
						$output = @$ipdat->geoplugin_regionName;
						break;
					case "region":
						$output = @$ipdat->geoplugin_regionName;
						break;
					case "country":
						$output = @$ipdat->geoplugin_countryName;
						break;
					case "countrycode":
						$output = @$ipdat->geoplugin_countryCode;
						break;
				}
			}
		}
		return $output;
	}




}



?>