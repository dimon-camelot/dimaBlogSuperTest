<?php

include_once 'classes/Router.php'; //подключаем класс роутера

include_once 'classes/Controllers/PostController.php';
include_once 'classes/Models/DB.php';
include_once 'classes/Models/Post.php';
include_once 'classes/Models/PostRepository.php';
include_once 'classes/Views/BaseView.php';
include_once 'classes/Views/PostView.php';
include_once 'classes/Controllers/HomeController.php';
include_once 'classes/Views/HomeView.php';
include_once 'classes/Controllers/PagingController.php';
include_once 'classes/Views/PagingView.php';

$routerObj = new Router(); //создаем экземпляр роутера

echo $routerObj->routerResponse(); //выводим ответ от роутера
