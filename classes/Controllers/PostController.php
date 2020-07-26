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
        $freshPosts = $postRepositoryObj->getFreshPosts();

        $postViewObj = new PostView($freshPosts, $post);

        return $postViewObj->getHtml();


    }

}