<?php


class PagingController
{
    public function show(){

        $pageID = 1;

        if (isset($_GET['pageid'])) {

            $pageID = $_GET['pageid'];
        }



        $postRepObj = new PostRepository();

        $allPosts = $postRepObj->getPostsForPage($pageID);

        $postsForSideBar = $postRepObj->getFreshPosts();

        $totalPostsCount = $postRepObj->pagesCount();



        $AllpostsViewObj = new AllpostsView($postsForSideBar, $allPosts, $totalPostsCount);

        return $AllpostsViewObj->getHtml();


    }

}