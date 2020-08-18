<?php


class PagingView extends BaseView
{
    /**
     * Посты к показу на текушей странице
     *
     * @var Post[]
     */
    protected $postsForShow;

    /**
     * Общее количество страниц
     *
     * @var int
     */
    protected $pagesAmount;

    /**
     * PagingView constructor.
     *
     * @param Post[] $postsForSideBar
     * @param Post[] $postsForShow
     * @param int    $pagesAmount
     */
    public function __construct($postsForSideBar, $postsForShow, $pagesAmount)
    {
        $this->postsForShow = $postsForShow;
        $this->pagesAmount = $pagesAmount;
        parent::__construct($postsForSideBar);
    }

    /**
     * Генерирует и возвращает html код страницы
     *
     * @return string
     */
    protected function getContent(): string
    {
        $html = '<hr>';
        foreach ($this->postsForShow as $item) {

            $html .= "<a href='index.php?controller=post&action=showSingle&id={$item->id}'><p><b>{$item->date}</b> {$item->title}</p></a>";

        }
        $html .= "<br>";

        for ($i = 1; $i <= $this->pagesAmount; $i++) {
            $html .= "<a href='index.php?controller=post&action=showList&pagenumber={$i}'>$i </a>";
        }

        return $html;
    }
}