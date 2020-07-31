<?php


class PostRepository
{
    protected $dbObj;

    public function __construct()
    {
        $this->dbObj = new DB(); //создаем экземпляр класса работы с БД
    }

    public function getPostById($id): object
    {
        $query = "select * from posts where id = $id"; //формируем запрос в БД по ИД
        $rawArray = $this->dbObj->makeSelectFromDB($query); //получаем сырой массив

        $post = new Post(); //создаем экземпляр поста


        //заполняем объект поста данными
        $post->title = $rawArray[0]['title'];
        $post->id = $rawArray[0]['id'];
        $post->date = $rawArray[0]['date'];
        $post->body = $rawArray[0]['body'];

        return $post;


    }

    public function getFreshPosts(): array
    {
        $query = "SELECT * FROM posts ORDER BY id DESC LIMIT 5";
        $rawArray = $this->dbObj->makeSelectFromDB($query); //получаем сырой массив

        $resaltArray = [];

        foreach ($rawArray as $item) {
            $post = new Post();

            $post->title = $item['title'];
            $post->id = $item['id'];
            $post->date = $item['date'];
            $post->body = $item['body'];

            $resaltArray[] = $post;

        }

        return $resaltArray;


    }

    public function getAllPosts(){
        $query = "SELECT * FROM posts ORDER BY id DESC ";
        $rawArray = $this->dbObj->makeSelectFromDB($query); //получаем сырой массив

        $resaltArray = [];

        foreach ($rawArray as $item) {
            $post = new Post();

            $post->title = $item['title'];
            $post->id = $item['id'];
            $post->date = $item['date'];
            $post->body = $item['body'];

            $resaltArray[] = $post;

        }

        return $resaltArray;

    }

}