<?php


class AllpostsController
{
    public function show(){

        $postRepObj = new PostRepository();

        $allPosts = $postRepObj->getAllPosts();

        $postsForSideBar = $postRepObj->getFreshPosts();

        $AllpostsViewObj = new AllpostsView($postsForSideBar, $allPosts);

        return $AllpostsViewObj->getHtml();


    }

}