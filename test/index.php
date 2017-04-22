<?php
// включим отображение всех ошибок

error_reporting (E_ALL); 


// подключаем конфиг
include ('config.php'); 


// подключаем ядро сайта
include (SITE_PATH . DS . 'core' . DS . 'core.php'); 

// Загружаем router
$router = new Router();
// задаем путь до папки контроллеров.
$router->setPath (SITE_PATH . 'controllers');

echo SITE_PATH;
// запускаем маршрутизатор
$router->start();
