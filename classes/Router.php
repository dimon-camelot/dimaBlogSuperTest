<?php


class Router
{
    public function routerResponse()
    {
        $controllerName = $_GET['controller']; //дёргаем назвние контроллера из ГЕТ запроса
        $actionName = $_GET['action']; //дёргаем названия экшена из ГЕТ запроса

        $controllerClassName = ucfirst($controllerName) . 'Controller'; //формируем имя контроллера, делая первую букву большой

        $controller = new $controllerClassName; //создаем экземпляр контроллера

        return $controller->$actionName(); //возвращаем результат экшена в контроллере

    }

}