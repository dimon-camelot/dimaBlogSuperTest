<?php


class HomeController
{
    public function show () {

        $homeViewObj = new HomeView();

        return $homeViewObj->getHtml();
    }

}