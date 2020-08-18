<?php


class AllpostsView extends BaseView
{
    protected $allPosts;
    protected $PagesCount;
    public function __construct($postsForSideBar, $allPost, $totalPostsCount)
    {
        $this->allPosts = $allPost;
        $this->PagesCount = $totalPostsCount;
        parent::__construct($postsForSideBar);
    }

    protected function getContent(): string
    {
        $html='<hr>';
        foreach ($this->allPosts as $item) {

            $html .= "<a href='index.php?controller=post&action=showPost&id={$item->id}'><p><b>{$item->date}</b> {$item->title}</p></a>";

        }
        $html .= "<br>";

        for ($i = 1; $i <= $this->PagesCount; $i++) {
            $html .= "<a href='index.php?controller=allposts&action=show&pageid={$i}'>$i </a>";
        }


        return $html;
    }
}