<?php
// Задаем константы:
define ('DS', DIRECTORY_SEPARATOR); // разделитель для путей к файлам
$sitePath = realpath(dirname(__FILE__) . DS) . DS;

define ('SITE_PATH',$sitePath ); // путь к корневой папке сайта

// для подключения к бд
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'blog_mvc');
define ('APP_ID',5993823);
define ('APP_SECRET', 'eR25k8jIZeLWUU4fK3lS');
define ('APP_MASK', "photos,notes,pages,docs,status,questions");
define ('USER_INFO','first_name,last_name,about,activities,bdate,books,city,country,crop_photo,education,interests,counters');
