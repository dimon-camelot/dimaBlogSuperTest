<?php


class HomeView extends BaseView
{

    protected function getContent(): string
    {
        $html = "
        <hr>
        <h3>Стартовая страница</h3>
        ";

        return $html;
    }
}