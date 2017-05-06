<?php

$parts = parse_url($url);
parse_str($parts['query'], $query);

if(in_array('format',$query)){
	$id=$query['id'];
	$groups = GetGroups($id);
	if($query['format']=='json'){
		echo ObjectToJson($groups);
	}
	if($query['format']=='xml'){
		echo JSONToXml(ObjectToJson($groups));
	}
}


?>