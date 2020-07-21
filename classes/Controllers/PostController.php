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

        $postViewObj = new PostView($post);

        return $postViewObj->getHtml();


    }

}