<?php


class PagingController
{
    private $perPage = 3;
    public function show(){

        $pageID = 1;

        if (isset($_GET['pageid'])) {

            $pageID = $_GET['pageid'];
        }



        $postRepObj = new PostRepository();

        $allPosts = $postRepObj->getPostsForPage($pageID, $this->perPage);

        $postsForSideBar = $postRepObj->getFreshPosts();

        $totalPostsCount = $postRepObj->pagesCount();



        $AllpostsViewObj = new PagingView($postsForSideBar, $allPosts, $totalPostsCount);

        return $AllpostsViewObj->getHtml();


    }

}