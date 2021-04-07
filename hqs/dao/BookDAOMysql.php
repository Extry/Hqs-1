<?php

require 'config.php';
require_once 'models/Book.php';

class BookDAOMysql implements BookDAO
{

    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function create(Book $b)
    {
        $sql = $this->pdo->prepare('INSERT INTO books (name,edition) VALUES (?,?)');
        $sql->execute([$b->getName(), $b->getEdition()]);
        $b->setId($this->pdo->lastInsertId());
        return $b;
    }

    public function getAll()
    {
        $array = [];
        $sql = $this->pdo->query('SELECT * FROM books');
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();
            foreach ($data as $item) {
                $b = new Book();
                $b->setId($item['id']);
                $b->setName($item['name']);
                $b->setEdition($item['edition']);
                $array[] = $b;
            }
        }
        return $array;
    }

    public function getById($id)
    {
        $sql = $this->pdo->prepare('SELECT * FROM books WHERE id = ?');
        $sql->execute([$id]);
        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();
            $b = new Book();
            $b->setId($data['id']);
            return $b;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $sql = $this->pdo->prepare('DELETE FROM books WHERE id = ?');
        $sql->execute([$id]);
    }
}
