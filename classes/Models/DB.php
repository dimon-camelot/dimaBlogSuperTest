<?php


class DB
{
    /**
     * @var mysqli
     */
    protected $dbLink;

    /**
     * DB constructor.
     */
    public function __construct()
    {
        $host = 'localhost';
        $database = 'dima_blog';
        $user = 'root';
        $password = 'root';

        $link = mysqli_connect($host, $user, $password, $database);

        $this->dbLink = $link;
    }

    /**
     * Делает select запрос к БД и упаковывает ответ в массив
     *
     * @param string $sql
     *
     * @return array
     */
    public function makeSelectFromDB(string $sql): array
    {
        $result = mysqli_query($this->dbLink, $sql);
        $array = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }

        return $array;

    }


}