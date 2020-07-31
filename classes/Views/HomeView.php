<?php


class HomeView extends BaseView
{

    protected function getContent(): string
    {
        $html = "
        <hr>
        <h3>Добрый день!</h3>
        <p>Меня зовут dimon-camelot. Вы попали в мой блог. Проект создан в процессе изучения PHP.
        Что касается постов - обычный копипаст из интернетов... Половину сам не читал. И это написал тоже, чтоб написано было))))
        ";

        return $html;
    }
}