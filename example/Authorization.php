<?php

class auth{


static $app_id = '5906561';
static $secret_key = '6Wk8wfl0BAbkHpx7oNXv';
static $params_code = array(
'client_id' => '5906561',
 'display' => 'page',
 'redirect_uri' => 'https://apivk-bekrenev.c9users.io/',
 'scope' => 'photos,notes,pages,docs,status,questions',
 'response_type' => 'code',
 'v' => '5.63'
);

static $get_access_code_url = 'http://oauth.vk.com/authorize?';
static $get_access_token_url = 'https://oauth.vk.com/access_token?';

function GetToken() {
$params = array(
'client_id' => auth::$app_id,
 'client_secret' => auth::$secret_key,
 'redirect_uri' => 'https://apivk-bekrenev.c9users.io/',
 'code' => $_SESSION['code']
);
$url = 'https://oauth.vk.com/access_token?' . http_build_query($params);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$token = json_decode(curl_exec($ch));
curl_close($ch);
return $token;
}
}
