<?php


class Router
{
    /**
     * @return string
     */
    public function routerResponse()
    {
        // Если ничего не пришло в запросе - действуем по-умолчанию, показываем домашнюю страницу
        if (empty($_GET)) {
            $homeControllerObj = new HomeController();

            return $homeControllerObj->show();
        }

        // Дёргаем назвние контроллера из ГЕТ запроса
        $controllerName = $_GET['controller'];

        // Дёргаем названия экшена из ГЕТ запроса
        $actionName = $_GET['action'];

        // Формируем имя контроллера, делая первую букву большой
        $controllerClassName = ucfirst($controllerName) . 'Controller';

        // Создаем экземпляр контроллера
        $controller = new $controllerClassName;

         // Возвращаем результат экшена в контроллере
        return $controller->$actionName();
    }

}