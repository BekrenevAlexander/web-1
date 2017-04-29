<?php
require 'Authorization.php';

session_start();
$_SESSION['code']=null;
$_SESSION['access_token']=null;
if (isset($_GET['code']) || (isset($_SESSION['code']))) {
    if (isset($_GET['code']) & !(isset($_SESSION['code']))) {
        
        $_SESSION['code'] = $_GET['code'];
    }
    header('Location: /profile.php');
}
else{
    header('Location:' . auth::$get_access_code_url . http_build_query(auth::$params_code));
}
?>

