<?php


class DB
{
    protected $dbLink;

    public function __construct()
    {
        $host = 'localhost';
        $database = 'dima_blog';
        $user = 'root';
        $password = 'root';

        $link = mysqli_connect($host, $user, $password, $database);

        $this->dbLink = $link;
    }

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