<?php


class HomeController
{
    public function show () {

        $postRepObj = new PostRepository();

        $postsForSideBar = $postRepObj->getFreshPosts();

        $homeViewObj = new HomeView($postsForSideBar);

        return $homeViewObj->getHtml();
    }

}