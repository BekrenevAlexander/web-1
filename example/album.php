
<?php
session_start();
require_once('Authorization.php');
require_once('func.php');
$USER_INFO="first_name,last_name,about,activities,bdate,books,city,country,crop_photo,education,interests,counters,sex,bdate";

if (isset($_SESSION['code'])) {
    if (!isset($_SESSION['access_token'])) {
        $vk = new apiFunc();
        $_SESSION['access_token'] = auth::GetToken();
        $user =$vk->get_object('users.get','&user_ids='.$_SESSION['access_token']->user_id.'&fields='.$USER_INFO.'&access_token ='.$_SESSION['access_token']->access_token);
        
    } else {
        $vk = new apiFunc();
        $user = $vk->get_object('users.get','&user_ids='.$_SESSION['access_token']->user_id.'&fields='.$USER_INFO.'&access_token ='.$_SESSION['access_token']->access_token);
        
    }
} else header('Location: /');
if (isset($_GET['name'])) $_SESSION['idalbum']=$_GET['name'];
$ida=$_SESSION['idalbum'];
if ($_SERVER['REQUEST_METHOD']==="POST")
{
    if (isset($_POST['mov']))
    {
        $out=$vk->get_object('photos.move','&owner_id='.$user->response[0]->uid.'&photo_id='.$_POST['idphoto'].'&target_album_id='.$_POST['album'].'&access_token='.$_SESSION['access_token']->access_token);
     
    }
    else if (isset($_POST['cover']))
    {
        $out=$vk->get_object('photos.makeCover','&owner_id='.$user->response[0]->uid.'&album_id='.$ida.'&photo_id='.$_POST['idphoto'].'&access_token='.$_SESSION['access_token']->access_token);
        
    }
    else if (isset($_POST['description']))
    {
        $out=$vk->get_object('photos.edit','&owner_id='.$user->response[0]->uid.'&photo_id='.$_POST['idphoto'].'&caption='.$_POST['description'].'&access_token='.$_SESSION['access_token']->access_token);
     
    }
    else if (isset($_FILES['file']))
    {
        var_dump(array('file1'=>$_FILES['file']));
        //$p['file1']='@'.$_FILES['file']['tmp_name'];
        $ph=array('photo'=>new CURLFile (realpath($_FILES['file']['tmp_name']),$_FILES['file']['type'],"image"));
        $ch = curl_init(); 
        curl_setopt ($ch, CURLOPT_URL, $_SESSION['upload_url']); 
        curl_setopt ($ch, CURLOPT_POST, true); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $ph); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
        curl_setopt($ch, CURLOPT_HEADER, 0); 
        //curl_setopt($ch,CURLOPT_INFILESIZE, $_FILES['file1']['size']);
        //JSON_encode($_FILES['file']);
        
        $otvet = JSON_decode(curl_exec($ch)); 
        curl_close($ch);
        var_dump($otvet);
        var_dump(new CURLFile (@realpath($_FILES['file']['tmp_name']),$_FILES['file']['type'],"image"));
        //$out=$vk->get_object('photos.save','&album_id='.$ida.'&server='.$otvet->server.'&hash='.$otvet->hash.'&photos_list='.$otvet->photos_list.'&access_token='.$_SESSION['access_token']->access_token);
        //var_dump($out);
    }
}
?>
<html>
<head>
    <meta charset="utf-8">
    <link href="bootstrap.css" rel="stylesheet" type="text/css"/>
</head>
<body style="; margin-top: 15px; ">
<a href="/profile.php">На главную</a>
<p class="h3" >
        Альбом: <?php 
        if (isset($_GET['title'])) $_SESSION['namealbum']=$_GET['title'];
        echo $_SESSION['namealbum'];
        ?>

<?php

$phot=$vk->get_object('photos.get','&owner_id='.$user->response[0]->uid.'&album_id='.$ida.'&extended=1&access_token='.$_SESSION['access_token']->access_token);
$photos=$phot->response;

echo ', количесвто фотографий:'.count($photos);
?>
</p>
<p>
    Загрузка фотографий в этот альбом
</p>
<?php 
    $servupload=$vk->get_object('photos.getUploadServer','&album_id='.$ida.'&access_token='.$_SESSION['access_token']->access_token);
    $_SESSION['upload_url']= $servupload->response->upload_url;
    
?>
<form action="/album.php" enctype="multipart/form-data" method="post">
    <input type="file" name="file" value="Выбрать файл">
    <input type="submit" name="uploadbtn" value="Залить">
</form>

<?php
    $albums=$vk->get_object('photos.getAlbums','&owner_id='.$user->response[0]->uid.'&need_covers=1&access_token='.$_SESSION['access_token']->access_token);
    
    foreach ($photos as $photo) {
        echo '<div><img src='.$photo->src_big.'>
                <p>
                    Описание: '.$photo->text.'
                </p>
                <p>
                    Лайков: '.$photo->likes->count.'
                </p>
                <p>
                    Комментариев: '.$photo->comments->count.'
                </p>
                <form name="change" action="/album.php" method="POST" >
                  Редактировать описание:<br>
                  <input type="text" name="description" value=""><br>
                  
                  <input type="submit" value="Редактировать описание">
                  <input type="submit" name=cover value="Сделать обложкой">
                  <input type="text" name=idphoto value='.$photo->pid.' style="visibility:hidden">
                </form>
            
                <form name="move" action="/album.php" method="POST" >
                    <p>Переместить в другой альбом</p>';
                    foreach ($albums->response as $album) 
                    {
                        if($ida != $album->aid)
                       echo '<input type="radio" name="album" value="'.$album->aid.'">'.$album->title.'<br>';
                    }
                    echo  '<input type="submit" name=mov value="переместить">
                    <input type="text" name=idphoto value='.$photo->pid.' style="visibility:hidden">
                    
                 
                 </form>
        </div>';
        }
    
?>
</div>
</body>
</html>
