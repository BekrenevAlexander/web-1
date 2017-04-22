<?php

//print_r($var);
echo '<div class="panel-body" style = "background-color: #FFF">'; 
for ($i=0;$i<Count($var);$i++)
{
echo '<div class="panel panel-default col-md-4" style = "color: black"> <div class="panel-body">';
  
  echo '<h4 align = "left">Название : '.$var[$i]->title.'</h4>';
  echo '<h4 align = "left">Размер : '.$var[$i]->size.'</h4>';
  
 echo '</div> </div>';	
	

}

echo '</div>';