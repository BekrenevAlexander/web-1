<?php 
include 'Authorization.php'; 
//https://www.youtube.com/watch?v=GFmefQ2mH8U 

//$obj->get_connection_to_token()
$obj = new Connection (5905871,'friends,photos'); 




$perspect = 'https://oauth.vk.com/authorize?client_id=5905871&scope=notify,photos,friends,audio,video,notes,pages,docs,status,questions,offers,wall,groups,messages,notifications,stats,ads,offline&redirect_uri=http://oauth.vk.com/blank.html&display=page&response_type=token';
$curl = curl_init($perspect);
curl_setopt($curl, CURLOPT_URL, $perspect);  
  
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
// указываем, что у нас POST запрос  
curl_setopt($curl, CURLOPT_POST, 1); 

$out = curl_exec($curl);
//print_r ($_GET);
//print_r ($_POST);
curl_close($curl);
echo $out;
echo 'fdsdf';

//$rop = file_get_contents($perspect);
//print_r($_POST);
//echo 'asdf';
//$rop = header("LOCATION: $perspect");



//'https://oauth.vk.com/authorize?client_id=5905871&scope=notify,photos,friends,audio,video,notes,pages,docs,status,questions,offers,wall,groups,messages,notifications,stats,ads,offline&redirect_uri=http://api.vk.com/blank.html&display=page&response_type=token'



//$oResponce = $obj->get_connection_to_token(); 
//$res=(JSON_decode( $oResponce)); 
//$obj->tok_name = $res->access_token;


//$get_usr = file_get_contents('https://api.vk.com/method/users.get?user_ids=217029942&fields=bdate&v=5.62'); //$obj->get_connection_method('users.get');
//print_r (JSON_decode($get_usr));



//'https://api.vk.com/method/users.get?id=217029942&fields=bdate'







?>