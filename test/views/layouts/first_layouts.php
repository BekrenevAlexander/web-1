<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
   
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css"> 
   <link rel = "stylesheet" href = "https://localhost/test/css/main.css">
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 

   
	
  <title>Фотографии Вконтакте</title>
</head>

<body class = "main">
	<div class = "head col-md-12">
		<img src = "http://localhost/test/images/head.png" class = "img-responsive">
	</div>
	
	<div class = "col-md-3" >
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Меню</h3>
			</div>
			
			<div class="panel-body">
				<a href="https:\\localhost\test\info">Профиль</a>
			</div>	
			
			<div class="panel-body">
				<a href="https:\\localhost\test\albums">Альбомы</a>
			</div>	
			
			<div class="panel-body">
				<a href="https:\\localhost\test\photos">Фотографии</a>
			</div>	

		</div>
	</div>
	

	<div class = "col-md-9" >
		<div class="panel panel-primary">
			<div class="panel-heading">
				
			
			
			
<?php
			include ($contentPage);
?>
				
			

		</div>
	</div>
	</div>


	

</body>
</html>