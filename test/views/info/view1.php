
<?php


echo "<h4>".$var->last_name." ".$var->first_name."</h4> </div>";
echo '<div class="panel-body" style = "background-color: #FFF">'; 

print_r($var);
if (isset($var->response[0]->crop_photo))
	echo '<div class = "col-md-4"><img src ="'.$var->crop_photo->photo->src_xbig.'" class = "img-responsive"></div>';
else
	echo '<div class = "col-md-4"><img src ="http://localhost/test/images/noimage.png" class = "img-responsive"></div>';
	
	$pt = new API_FUNCTIONS();
	foreach ($var as $key=>$element)
	{
		switch ($key)
		{
			case 'bdate': {echo "Дата рождения: $element";}break;
			case 'city': {
							 echo "<br>Город: "; 	
							 $f=$pt->get_object('database.getCitiesById',"city_ids=$element");
							 echo $f->response[0]->name."</br>";
						 }break;						 
			case 'country': { 
							 echo "<br>Страна: "; 	
							 $f=$pt->get_object('database.getCountriesById',"country_ids=$element");
							 echo $f->response[0]->name."</br>";
			
							}break;
			case 'university_name': {}break;
			
		}
		//echo "<br>$key       $element</br>";
		
	}
	
	
	
echo '</div>';

 function get_info ($function_name,$element)
 {
	 $pt = new API_FUNCTIONS();
	 $f=$pt->get_object('database.getCitiesById',"city_ids=$element");
	 return $f->response[0]->name;
 }
 
 
 
 ?>