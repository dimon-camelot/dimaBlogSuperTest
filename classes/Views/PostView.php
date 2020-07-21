<?php




class PostView extends BaseView
{
    public $postObj;

    public function __construct($postObj)
    {
        $this->postObj = $postObj;
    }


    public function getContent(): string
    {
        $html = "
        <html>
        <head>
        <title>Пост</title>
        </head>
        <body>
        <h2>{$this->postObj->title}</h2>
        <h3>{$this->postObj->date}</h3>
        <h4>{$this->postObj->body}</h4>
        </body>
        </html>
        ";

        return $html;

    }

}