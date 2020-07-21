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

}