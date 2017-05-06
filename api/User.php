<?php


if(isset($_GET['format'])){
	$id=$_GET['id'];
	$user = GetUser($id);
	if($_GET['format']=='json'){
		echo ObjectToJson($user);
	}
	if($_GET['format']=='xml'){
		echo JSONtoXML(ObjectToJson($user))->asXml();
	}
}


?>