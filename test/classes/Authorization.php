<?php



class Connection
{

var $url_const_first = 'https://oauth.vk.com/authorize?';
var $url_const_second = 'https://oauth.vk.com/access_token?';
var $redirect_url = 'https://localhost/test/info/view1';
var $start_params;
var $second_params;
var $code;
var $token;
var $user_id;

function __construct ($app_id, $app_secrets, $mask)
	{
		
		$this->start_params = 		
		[
		'client_id'=>$app_id,
		'redirect_uri'=>$this->redirect_url,
		'display'=>'page',
		'skope' =>$mask,
		'response_type'=>'code',
		'v'=>5.63
		];
		
		$this->second_params = 
		[
		'client_id'=>$app_id,
		'client_secret'=>$app_secrets,
		'redirect_uri'=>'https://localhost/test/info/view1',
		'code'=>$this->code
		];				
	}


	function get_start_connect ()
		{
			return $this->url_const_first.'client_id='.$this->start_params['client_id'].'&redirect_uri='.$this->redirect_url.'&display='.$this->start_params['display'].'&scope='.$this->start_params['skope'].'&response_type='.$this->start_params['response_type'].'&v='.$this->start_params['v'];
		}

	function get_token_connect ()
		{
			return $this->url_const_second.'client_id='.$this->second_params['client_id'].'&client_secret='.$this->second_params['client_secret'].'&redirect_uri='.$this->second_params['redirect_uri'].'&code='.$this->second_params['code'];
		}

	public function get_code ()
	{	
		//$ch = curl_init();
		//curl_setopt($ch, CURLOPT_URL, $this->get_start_connect());
		//curl_setopt($ch, CURLOPT_HEADER, 1);
		//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);	
		//curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,1);	
		//curl_exec($ch);
		//curl_close($ch); 
		header('HTTP/1.1 301 Moved Permanently');
		header("LOCATION:".$this->get_start_connect());
	}
	

	
	public function set_code ($code)
	{
		$this->second_params['code'] = $code;		
	}
	
	public function set_token ($token)
	{
		$this->token = $token;
	}
	
	public function get_token_true()
	{
		return $this->token;
	}
	
	public function get_token ()
	{
		
		echo $this->get_start_connect();
	 $curl = curl_init();
	 curl_setopt ($curl,CURLOPT_URL, $this->get_token_connect());
	 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	 curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	 curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	 curl_setopt($curl, CURLOPT_HEADER, 0);
	 $result = curl_exec($curl);
	 curl_close($curl);
	 

	 if (isset($result))
	 {
		 $p = JSON_decode($result);
		 print_r($p);
		 $this->token=$p->access_token; //тут потом надо вносить данные в базу
		 $this->user_id = $p->user_id;
		 return true;
	 }
	 else
		 return false;
	
	
	}
	
}













?>