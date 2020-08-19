<?php


class PostController
{
    /**
     * Постов на страницу
     *
     * @var int
     */
    private $perPage = 3;

    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->postRepository = new PostRepository;
    }

    /**
     * @return string
     */
    public function showList()
    {
        // Определяемся с номером текущей страницы, которую хотим показать
        $pageNumber = (isset($_GET['pagenumber'])) ? $_GET['pagenumber'] : 1;


        // Просчитываем сколько всего у нас страниц
        $pagesAmount = ceil($this->postRepository->getPostsTotalAmount() / $this->perPage);
        $pagesAmount = (int)$pagesAmount;

        // Получаем у репозитория посты для конкретной страницы
        $limit = $this->perPage;
        $offset = ($pageNumber - 1) * $this->perPage;
        $postsForPage = $this->postRepository->getPosts($limit, $offset);


        // Получаем у репозитория свежие посты для сайдбара
        $postsForSideBar = $this->postRepository->getFreshPosts();


        $view = new PagingView($postsForSideBar, $postsForPage, $pagesAmount);

        return $view->getHtml();
    }

    /**
     * @return string
     */
    public function showSingle()
    {
        // Получаем из запроса id запроса
        if (!($_GET['id'])) {
            die('Не указан ID поста');
        }
        $postId = $_GET['id'];


        // Получаем пост из репозитория по id
        $postForShow = $this->postRepository->getPostById($postId);


        // Получаем массив постов для сайдбара
        $postsForSideBar = $this->postRepository->getFreshPosts();


        $view = new PostView($postsForSideBar, $postForShow);

        return $view->getHtml();
    }

}