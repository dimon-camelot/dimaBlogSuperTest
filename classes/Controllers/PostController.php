<?php


class PostController
{
    public function showPost()
    {
        if (!($_GET['id'])) {
            die('Не указан ID поста');
        }

        $postID = $_GET['id'];



        $postRepositoryObj = new PostRepository;

        $post = $postRepositoryObj->getPostById($postID);

        $postsForSideBar = $postRepositoryObj->getFreshPosts();//  приходится дублировать эту строку в других контроллерах

        $postViewObj = new PostView($postsForSideBar, $post);

        return $postViewObj->getHtml();


    }

}