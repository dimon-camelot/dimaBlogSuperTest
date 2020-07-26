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
        <hr>
        <h3>{$this->postObj->title}</h3>
        <h4>{$this->postObj->date}</h4>
        <br>
        <p>{$this->postObj->body}</p>
        <br>
        </body>
        </html>
        ";

        return $html;

    }

}