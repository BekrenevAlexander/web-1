<?php
$parts = parse_url($url);
parse_str($parts['query'], $query);

if(in_array('format',$query)){
	$id=$query['groupId'];
	$products = GetProducts($id);
	if($query['format']=='json'){
		echo ObjectToJson($products);
	}
	if($query['format']=='xml'){
		echo JSONToXml(ObjectToJson($products));
	}
}


?>