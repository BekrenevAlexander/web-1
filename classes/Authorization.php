<?php



class Connection
{

var $request_params;
var $tok_name;

function __construct ($app_id, $mask)
{
	//$this->permission = explode(',',$mask);
	$this->request_params = 
	[
	'client_id' =>$app_id,
	'client_secret'=>'GBWYB5Rz7W1JWg6ju3sj',
	'grant_type'=>'client_credentials'
	];
	//$this->id = $app_id;
	//$this->mask = $mask;	
}


public function get_connection_to_token ()
{
	return  file_get_contents ('https://oauth.vk.com/access_token?'.http_build_query($this->request_params));            //'https://oauth.vk.com/authorize?'.http_build_query($this->request_params);
}

function get_connection_method ($method_name, $instruction)
{
	return  file_get_contents('https://api.vk.com/method/'.$method_name.'?'.'&fields='.$instructions.'&access_token='.$this->tok_name.'&v=5.62');
}


}













?>