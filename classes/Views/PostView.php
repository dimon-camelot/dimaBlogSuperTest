<?php


class PostView extends BaseView
{

    /**
     * Пост, который вьюха отображает на странице
     *
     * @var Post
     */
    public $post;

    /**
     * PostView constructor.
     *
     * @param Post[] $postsForSidebar
     * @param Post   $postForShow
     */
    public function __construct($postsForSidebar, $postForShow)
    {
        $this->post = $postForShow;

        parent::__construct($postsForSidebar);
    }

    /**
     * Генерирует и отдает html код
     *
     * @return string
     */
    protected function getContent(): string
    {
        $html = "
        <hr>
        <h3>{$this->post->title}</h3>
        <h4>{$this->post->date}</h4>
        <br>
        <p>{$this->post->body}</p>
        <br>
        ";

        return $html;
    }

}