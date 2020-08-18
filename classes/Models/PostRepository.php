<?php


class PostRepository
{
    /**
     * @var DB
     */
    protected $dbObj;

    /**
     * PostRepository constructor.
     */
    public function __construct()
    {
        $this->dbObj = new DB(); // Создаем экземпляр класса работы с БД
    }


    /**
     * Делает SELECT запрос в бд к таблице 'posts' и возвращает массив объектов Post
     *
     * По умолчанию сортирует по полю id в убывающем порядке
     * Можно прокинуть limit, offset или отсортировать по-другому полю или в другом порядке
     *
     * @param null   $limit
     * @param int    $offset
     * @param string $orderByField
     * @param string $orderType
     *
     * @return array
     */
    public function getPosts($limit = null, int $offset = 0, $orderByField = 'id', $orderType = 'DESC'): array
    {
        // Создаем базовый SELECT с offset и сортировкой, например "SELECT * FROM posts ORDER BY id DESC OFFSET 0"
        $sql = "SELECT * FROM posts ORDER BY {$orderByField} {$orderType} OFFSET {$offset}";


        // Если пользователь нашего метода захотел установить лимит, и прислал не null, добавляем его в запрос
        if (!is_null($limit)) {
            $sql .= " LIMIT {$limit}";
        }

        // Делаем запрос к бд и получаем ответ. Массив массивов
        $rawArray = $this->dbObj->makeSelectFromDB($sql);

        $resultArray = [];

        foreach ($rawArray as $item) {
            // Из каждого массива создаем объект
            $resultArray[] = $this->makeObjectFromDbItem($item);
        }

        return $resultArray;
    }

    /**
     * Ищет и возвращает конкретный пост по id из бд
     *
     * Если ничего не нашлось возвращает null
     *
     * @param $id
     *
     * @return Post
     */
    public function getPostById($id): ?Post
    {
        $sql = "SELECT * FROM posts WHERE id = {$id}";

        // Делаем запрос к бд и получаем ответ. Массив массивов
        $rawArray = $this->dbObj->makeSelectFromDB($sql);

        // Если ничего не нашлось и пришел пустой массив, возвращает null
        if (empty($rawArray)) {
            return null;
        }

        $item = $rawArray[0];

        return $this->makeObjectFromDbItem($item);
    }

    /**
     * Возвращает общее количество записей в БД
     *
     * @return int
     */
    public function getPostsTotalAmount(): int
    {
        $query = "SELECT COUNT(*) from `posts`";

        $rawArray = $this->dbObj->makeSelectFromDB($query);

        $count = $rawArray[0]['COUNT(*)'];

        return (int)$count;
    }

    /**
     * Возвращает свежие посты
     *
     * По умолчанию возвращает 5 последний штук
     *
     * @param int $amount
     *
     * @return array
     */
    public function getFreshPosts($amount = 5): array
    {
        return $this->getPosts($amount);
    }

    /**
     * Перегоняет массив от БД в котором лежат поля записи блога в объект Post
     *
     * @param $array
     *
     * @return Post
     */
    protected function makeObjectFromDbItem($array)
    {
        $post = new Post;

        $post->title = $array['title'];
        $post->id = $array['id'];
        $post->date = $array['date'];
        $post->body = $array['body'];

        return $post;
    }
}