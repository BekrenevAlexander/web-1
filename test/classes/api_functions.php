<?php


class API_FUNCTIONS
{
	var $const_method_string = 'https://api.vk.com/method/';
	
	//function get_command ($method_name, $parameters, $access_token)
//	{
	//	$result = $this->const_method_string.$method_name.'?';
	//	for (reset($parameters); ($key = key($parameters)); next($parameters))
	//	{
	//		$result = $result.$key.'='.$parameters[$key].'&';
	//	}
		
	//	return $result.'access_token='.$access_token.'&v=5.63';
	//}
	
	
	public function get_object ($method_name, $parameters)
	{
		$curl = curl_init();
		curl_setopt ($curl, CURLOPT_URL, $this->const_method_string.$method_name);
		curl_setopt ($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $parameters);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		
		$result = curl_exec($curl);
		
		curl_close($curl);
		
		return JSON_decode($result);
	}	
	
		public function get_object_one ($method_name, $parameters)
	{
		
		echo ($this->const_method_string.$method_name.'?'. $parameters);
		$curl = curl_init();
		curl_setopt ($curl, CURLOPT_URL, $this->const_method_string.$method_name.'?'. $parameters);
		//curl_setopt ($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($curl, CURLOPT_POSTFIELDS, $parameters);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		
		$result = curl_exec($curl);
		
		curl_close($curl);
		
		return JSON_decode($result);
	}	
	
	
	//https://myrusakov.ru/php-curl-post.html
}



?>