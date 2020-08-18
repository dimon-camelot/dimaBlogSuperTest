<?php


class HomeController
{
    /**
     * @var PostRepository
     */
    protected $postRepository;

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->postRepository = new PostRepository;
    }

    /**
     * @return string
     */
    public function show () {
        // Получаем свежие посты для сайдбара
        $postsForSideBar = $this->postRepository->getFreshPosts();

        $view = new HomeView($postsForSideBar);

        return $view->getHtml();
    }

}