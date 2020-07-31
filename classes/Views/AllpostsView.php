<?php


class AllpostsView extends BaseView
{
    protected $allPosts;
    public function __construct($postsForSideBar, $allPost)
    {
        $this->allPosts = $allPost;
        parent::__construct($postsForSideBar);
    }

    protected function getContent(): string
    {
        $html='<hr>';
        foreach ($this->allPosts as $item) {

            $html .= "<a href='index.php?controller=post&action=showPost&id={$item->id}'><p><b>{$item->date}</b> {$item->title}</p></a>";

        }
        $html .= "<br>";
        return $html;
    }
}