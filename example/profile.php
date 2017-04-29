
<?php
session_start();
require_once('Authorization.php');
require_once('func.php');
$USER_INFO="first_name,last_name,about,activities,bdate,books,city,country,crop_photo,education,interests,counters,sex,bdate";

if (isset($_GET['logout'])) {
    session_destroy();
    header('location: https://apivk-bekrenev.c9users.io');
}
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
?>
<html>
<head>
    <meta charset="utf-8">
    <link href="bootstrap.css" rel="stylesheet" type="text/css"/>
</head>
<body style="; margin-top: 15px; ">
<div>
    <nav class="navbar navbar-inverse navbar-fixed-top" style="margin-bottom: 0">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/profile.php">VK</a>
            </div>
            <ul class="nav navbar-nav">
                <li style = "width: 200px" >
                    <a class="dropdown-toggle" data-toggle="dropdown"><?php  echo $user->response[0]->first_name.' '.$user->response[0]->last_name; ?></a>
                       
                </li>
            </ul>
            <img src=<?php echo $user->response[0]->crop_photo->photo->src_small; ?>>
                
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo '?logout=true'; ?>"> <span class="glyphicon glyphicon-log-out"></span>Выйти</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<div style="margin-top: 50" >
<p class="h3">
                            Страна: <?php //var_dump($user->response[0]->country);
                           // $city= $vk->get_object('database.getCountryById','&country_ids='.$user->response[0]->country.'&v=5.63&access_token='.$_SESSION['access_token']->access_token);
                           // var_dump($city);
                           // die();
                            echo $user->response[0]->country?>
</p>  
<p class="h3">
                             Город: <?php //$city= $vk->get_object('database.getCitiesById','&params[city_ids]='.$user->response[0]->city.'&params[v]=5.63&access_token='.$_SESSION['access_token']->access_token);
                            echo $user->response[0]->city;?>

</p>
</div>
<div >
<p class="h3" >

    Количество альбомов с фотографиями: <?php 
    $albums=$vk->get_object('photos.getAlbums','&owner_id='.$user->response[0]->uid.'&need_covers=1&access_token='.$_SESSION['access_token']->access_token);
    
    echo 2+count($albums->response); ?>
</p>
<p class="h3" >
        Альбомы:
</p>
<?php
$wall=$vk->get_object('photos.get','&owner_id='.$user->response[0]->uid.'&album_id=wall&access_token='.$_SESSION['access_token']->access_token);
$profile=$vk->get_object('photos.get','&owner_id='.$user->response[0]->uid.'&album_id=profile&access_token='.$_SESSION['access_token']->access_token);
echo '<div><a href="/album.php?name=wall&title=Фотографии+ +со+ +стены">Фотографии со стены </a> ';
echo '<img src='.$wall->response[0]->src.'></div>';
echo '<div><a href="/album.php?name=profile&title=Фотографии+ +профиля">Фотографии с моей страницы </a> ';
echo '<img src='.$profile->response[0]->src.'></div>';
?>
<?php
     //$albumwall=$vk->get_object('photos.getAlbums','&owner_id='.$user->response[0]->uid.'&album_ids="wall"&need_covers=1&access_token='.$_SESSION['access_token']->access_token);
    //var_dump($albumwall);
    
    foreach ($albums->response as $album) {
        //var_dump($album);
        echo '<div><a href=/album.php?name='.$album->aid.'&title='.$album->title.'>'.$album->title.'</a> 
            <img src='.$album->thumb_src.'></div>';
        }
    

?>

</div>
</body>
</html>
